<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class PracticeSubmitController extends Controller
{
    public function run(Request $request)
    {
        function setenv() {
            exec('echo $PATH' , $res);
            if(!$res){
                $path = join(",", $res);
                putenv("PATH=" . $path);
            }
        }
        $data = $request->all();

        $path = public_path() . "/codetest/" . $data['user_id'];
        $contest_path = public_path() . '/' . $data['C_name'] . '/' . $data['P_code'];
        $input_path = $contest_path . "/in/*";
        $output_path = $contest_path . "/out/*";
        $input_filename = glob($input_path);
        $output_filename = glob($output_path);
        $testfile_num = count($input_filename);

        //データベースに追加
        $now_time = new DateTime('now');
        $now_time->setTimeZone( new DateTimeZone('Asia/Tokyo'));
        $id = DB::table('submit')->insertGetId([
            'user_id' => $data['user_id'],
            'Contest_name' => $data['C_name'],
            'Problem_Code' => $data['P_code'],
            'Problem_name' => $data['P_name'],
            'created_at' => $now_time
        ]);

        //cppファイルの作成
        if (is_dir($path) === false) {
            mkdir($path, 0777);
        }
        $cppfilename = $path . "/main.cpp";
        if (file_exists($cppfilename) === false) {
            touch($cppfilename);
        }
        //cppファイルへの書き込み
        $fp = fopen($cppfilename, "w");
        fwrite($fp, $data['source']);
        fclose($fp);
        //cppファイルのコンパイル
        //ファイルコンパイル
        $output = null;
        $status = "AC";
        $time = 0;
        $used = 0;
        chdir($path);
        setenv();
        $cmd = 'g++ -o submit main.cpp 2>&1';
        $result1 = exec($cmd, $output, $retval);
        //実行
        if ($retval == 0) {
            //コンパイル成功
            for($i=0; $i<$testfile_num; $i++){
                //実行
                //入力要求
                $time_start = microtime(true);
                $used_start = memory_get_usage() / (1024*1024);
                $cmd = "timeout 3 submit.exe < " .$input_filename[$i];
                exec($cmd, $output,$retval);
                $time = microtime(true) - $time_start;
                $used = memory_get_usage() / (1024*1024) - $used_start;

                //提出の正誤判定
                $put = implode("\n", $output);
                $output = $put . "\n";
                $filename = $output_filename[$i];
                $solver = file_get_contents($filename);
                if($solver !== $output){
                    $status = "WA";
                }
                if($time > 2000){
                    $status = "TLE";
                }
                if($used > 1024){
                    $status = "MLE";
                }
                if($retval !== 0){
                    $status = "RE";
                }
            }
        } else {
            //コンパイルエラー
            $retval = 2;
            $status = "CE";
        }

        //データベースへの結果の書き込み
        $now_time = new DateTime('now');
        $now_time->setTimeZone( new DateTimeZone('Asia/Tokyo'));
        DB::table('submit')->where('id', '=', $id)->update([
            'Status' => $status,
            'updated_at' => $now_time
        ]);

        //スコア状況データベースへの書き込み
        $point = 0;
        if($status==="AC"){
            if($data['P_code']==="A"||$data['P_code']==="B"){
                $point =100;
                DB::table('submit')->where('id', '=', $id)->update([
                    'points' => 100
                ]);
            }else if($data['P_code']==="C"||$data['P_code']==="D"){
                $point=200;
                DB::table('submit')->where('id', '=', $id)->update([
                    'points' => 200
                ]);
            }else{
                $point =400;
                DB::table('submit')->where('id', '=', $id)->update([
                    'points' => 400
                ]);
            }
        }else{
            DB::table('submit')->where('id', '=', $id)->update([
                'points' => 0
            ]);
        }

        //ランキングカラムテーブルへに書き込み
        //初めての提出であれば挿入
        $user_data = DB::table('users')->where('id','=',$data['user_id'])->first();
        $user_name = $user_data->name;
        $presence_status = DB::table('spc001')->where('user',"=",$data['user_id'])->exists();
        if($presence_status===false) {
            DB::table('spc001')->insert([
                'user' => $data['user_id'],
                'name' => $user_name,
                'points' => '0',
                'created_at' => $now_time,
                'updated_at' => $now_time
            ]);
        }
        //コンテスト開始時間の取得
        $contest = DB::table('contest')->where('Contest_code','=',$data['C_name'])->first();
        //常設コンテストの時は行わない
        if($contest->status!=='P') {
            $start_time = new DateTime($contest->star,new DateTimeZone('Asia/Tokyo'));
            //ランキングテーブル更新ちんぽ
            if($status==='AC'){
                //データの取り込み
                $ranking = DB::table($data['C_name'])->where('user','=',$data['user_id'])->first();
                //タイムの導出
                $time = $now_time -> diff($start_time);
                $minutes = $time->h*60 + $time->i;
                $answer_time = $minutes.":".$time->s;
                //正解した問題の状態確認
                $aaa = $data['P_code'];
                if($ranking->$aaa!="AC"){
                    //書き換え
                    $point_name = $data['P_code'].'_point';
                    $new_point = $ranking->points + $point;
                    DB::table($data['C_name'])->where('user','=',$data['user_id'])->update([
                        $point_name => $point,
                        $data['P_code'] => 'AC',
                        'points' => $new_point,
                        'updated_at' => $now_time,
                        'time' => $answer_time
                    ]);
                }
            }
        }
    //順位を更新ちんぽ
        //ソートをかけてデータを取得
        $rank = DB::table($data['C_name'])->orderBy('points','desc')->orderBy('u@dated_at','asc')->get();
        $num = count($rank);
        for($i=0;$i<$num;$i++){
            $user_id = $rank[$i]->user;
            //挿入
            DB::table($data['C_name'])->where('user','=',$user_id)->update([
                'rank' => $i+1
            ]);
        }

        //確認用の送信
        $result = array(
            'output' => '通信成功'
        );
        return response()->json($result);
    }
}
