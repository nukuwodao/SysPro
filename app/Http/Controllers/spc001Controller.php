<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTIme;
use Illuminate\Support\Facades\DB;

class spc001Controller extends Controller
{
    public function problem() {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-problems');
        }
    }

    public function problemA() {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-problem-A');
        }
    }

    public function problemB() {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-problem-B');
        }
    }

    public function problemC() {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-problem-C');
        }
    }

    public function problemD() {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-problem-D');
        }
    }

    public function problemE() {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-problem-E');
        }
    }

    public function submit(){
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='A'){
            return view('spc001.spc001-after');
        }else{
            return view('spc001.spc001-submit');
        }
    }
}
