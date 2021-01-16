<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class databaseController extends Controller
{
    public function run(Request $request) {
        $data = $request->all();

        $read_data = DB::table('submit')->where('user_id','=',$data['user_id'])->where('Contest_name','=',$data['C_code'])->orderBy('created_at','desc')->get();
        $first = DB::table('submit')->where('user_id','=',$data['user_id'])->orderBy('created_at','desc')->where('Contest_name','=',$data['C_code'])->first();
        $status = $first->Status;

        //常設コンテスト以外の時
        $ranking = null;
        $Time = null;
        $Point = null;
        $Rank = null;
        if(DB::table($data['C_code'])->where('user','=',$data['user_id'])->exists()){
            $ranking = DB::table($data['C_code'])->where('user','=',$data['user_id'])->first();
            $Time = $ranking -> time;
            $Point = $ranking -> points;
            $Rank = $ranking -> rank;
        }

        $result = array(
            'Data' => $read_data,
            'status' => $status,
            'rank' => $Rank,
            'point' => $Point,
            'time' => $Time
        );
        return response()->json($result);
    }
}
