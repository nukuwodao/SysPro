<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodetestController extends Controller
{
    public function run(Request $request) {
        function setenv() {
            exec('echo $PATH' , $res);
            if(!$res){
                $path = join(",", $res);
                putenv("PATH=" . $path);
            }
        }
        $data = $request->all();

        $path = public_path()."/codetest/".$data['user_id'];

        if(is_dir($path)===false){
            mkdir($path, 0777);
        }
        $cppfilename = $path."/main.cpp";
        if(file_exists($cppfilename)===false){
            touch($cppfilename);
        }
        $errfilename = $path."/error.txt";
        if(file_exists($errfilename)===false){
            touch($errfilename);
        }
        $inpfilename = $path."/input.txt";
        if(file_exists($inpfilename)===false){
            touch($inpfilename);
        }

        //cppファイルへ書き込み
        $fp = fopen($cppfilename, "w");
        fwrite($fp, $data['source']);
        fclose($fp);
        //inputファイル書き込み
        $fp = fopen($inpfilename,"w");
        fwrite($fp,$data['input']);
        fclose($fp);

        //ファイルコンパイル
        $output = null;
        $time = 0;
        $used = 0;
        chdir($path);
        setenv();
        $cmd = 'g++ -o test main.cpp 2>&1';
        $result1 = exec($cmd, $output, $retval);
        if($retval==0){
            //コンパイル成功
            //実行
            if($data['input']!=null){
                //入力要求
                $time_start = microtime(true);
                $used_start = memory_get_usage() / (1024*1024);
                $cmd = 'timeout 3 test.exe < input.txt';
                exec($cmd, $output,$retval);
                $time = microtime(true) - $time_start;
                $used = memory_get_usage()/(1024*1024) - $used_start;
            }else{
                $time_start = microtime(true);
                $used_start = memory_get_usage() / (1024*1024);
                $cmd = "timeout 3 test.exe";
                $result4 = exec($cmd,$output,$retval);
                $time = microtime(true) - $time_start;
                $used = memory_get_usage()/(1024*1024) - $used_start;
            }
        }else {
            //コンパイルエラー
            $retval = 2;
        }
        if($used > 1024){
            $retval = 3;
        }
        if($time > 2000){
            $retval = 4;
        }
        $time = round($time,2);
        $used = round($used);
        $out = mb_convert_encoding($output,'UTF-8','SJIS');
        $result = array(
          'output' => implode("\n", $out),
          'status' => $retval,
          'time' => $time,
          'memory' => $used
        );

        return response()->json($result);
    }
}
