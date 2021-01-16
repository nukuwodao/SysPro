<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sample
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
        if(DB::table('contest')->exists()!==true){
            $now_time = new DateTime('now');
            $now_time -> setTimeZone( new DateTimeZone('Asia/Tokyo'));
            DB::table('contest')->insert([
                'Contest_code' => 'practice',
                'Contest_name' => 'Practice Contest',
                'num' => 1,
                "status" => 'P',
                'allocation' => '100',
                'created_at' => '2021-01-11 00:00:00',
                'updated_at' => '2021-01-11 00:00:00'
            ]);

            DB::table('contest')->insert([
                'Contest_code' => 'spc001',
                'Contest_name' => 'SystemInfo. Programing Contest',
                'num' => 5,
                "status" => 'B',
                'allocation' => '100-100-200-200-400',
                'star' => '2021-01-23 14:00:00',
                'end' => '2021-01-23 15:40:00',
                'contest_time' => '100',
                'created_at' => '2021-01-12 00:00:00',
                'updated_at' => '2021-01-12 00:00:00'
            ]);
        }

        if(DB::table('contest')->where('Contest_code','=','spc001')->exists()) {
            $contest = DB::table('contest')->where('Contest_code', '=', 'spc001')->get();
            $start_time = new DateTime($contest[0]->star, new DateTimeZone('Asia/Tokyo'));
            $end_time = new DateTime($contest[0]->end, new DateTimeZone('Asia/Tokyo'));
            $now_time = new DateTime('now');
            $now_time->setTimeZone(new DateTimeZone('Asia/Tokyo'));
            if ($now_time < $start_time) {
                $status = 'B';
            } else if ($now_time > $end_time) {
                $status = 'A';
            } else {
                $status = 'H';
            }
            DB::table('contest')->where('Contest_code', '=', 'spc001')->update([
                'status' => $status
            ]);
        }
        return $next($request);
    }
}
