<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class spc001_topController extends Controller
{
    public function run(){
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-top-after');
        }else{
            return view('spc001.spc001-top');
        }
    }
}
