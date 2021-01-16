<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class web
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $contest = DB::table('contest')->where('Contest_code','=','spc001')->get();
        if($contest[0]->status==='B'||$contest[0]->status==='A'){
            return view('spc001.spc001-problem-before');
        }
        return $next($request);
    }
}
