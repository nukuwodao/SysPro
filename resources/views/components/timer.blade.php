<?php
    $contest = DB::table('contest')->where('Contest_code','=',$code)->get();
    $start_time = new DateTime($contest[0]->star,new DateTimeZone('Asia/Tokyo'));
    $end_time = new DateTime($contest[0]->end,new DateTimeZone('Asia/Tokyo'));
    $status = $contest[0]->status;
    //$time = DateTime::createFromFormat('Y-m-d H:i:s', '2021-01-10 16:28:00');
    $time1 = new DateTime('now');
    $time1 -> setTimeZone( new DateTimeZone('Asia/Tokyo'));
    $time2 = $end_time->diff($time1);
    $to_time = $time2->h*3600 + $time2->i*60 + $time2->s;
?>

<div class="modal js-modal" id="after">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
        <p>
            以上でコンテスト終了です．
            お疲れさまでした．
        </p>
        <a href= <?php echo url('/'.$contest[0]->Contest_code."/top"); ?>>閉じる</a>
    </div><!--modal__inner-->
</div><!--modal-->

<div class="modal js-modal" id="at">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
        <p>
            コンテストが開始しました．
            頑張ってください．
        </p>
        <a href= <?php echo url('/'.$contest[0]->Contest_code."/top"); ?>>閉じる</a>
    </div><!--modal__inner-->
</div><!--modal-->

<div class="modal js-modal" id="before">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
        <p>
            コンテスト開始前です．
            以下のルールを確認して，しばらくお待ちください．
        </p>
        <div class="to_Time">
            <p>コンテスト開始まで...</p>
            <div id="result"></div>
        </div>
        <ul class="rule_modal">
            <li>今回は制作の都合上，言語はc++のみです．</li>
            <li>問題はA~Eの5つあります．</li>
            <li>コンテスト中に問題に正解すると得点を獲得できます．</li>
            <li>順位は総合得点により決定します．</li>
            <li>同店の場合は提出時間の早い人が上位となります．</li>
            <li>今回はAtcoderのABC133，ABC140の問題を使用しています．</li>
        </ul>
        <a href= <?php echo url('/'); ?>>ホームへ戻る</a>
    </div><!--modal__inner-->
</div><!--modal-->

<div class="mato">
    <div class="timer_out">
        <div class="timer_in">
            <span class="timer_title">終了まで</span>
            <div id="basicUsage">00:00:00</div>
        </div>
    </div>
</div>

        <script>
            var status = <?php echo json_encode($status) ?>;
            if(status === "H"){
                //$('div.time_out').fadeIn();
                var time = <?php echo json_encode($to_time); ?>;
                console.log(time);
                var timer = new easytimer.Timer();
                timer.start({countdown: true, startValues: {seconds:time}});

                $('#basicUsage').html(timer.getTimeValues().toString());

                timer.addEventListener('secondsUpdated', function (e) {
                    $('#basicUsage').html(timer.getTimeValues().toString());
                });

                timer.addEventListener('targetAchieved', function (e) {
                    ('div.time_out').fadeOut();
                    $('div#after.js-modal').fadeIn();
                    <?php
                    DB::table('contest')->where('Contest_code','=', $code)->update([
                        'status' => 'A',
                        'updated_at' => now()->setTimeZone( new DateTimeZone('Asia/Tokyo'))
                    ]);
                    ?>
                        return false;
                });
            }else if(status==="B"){
                $('div#before.js-modal').fadeIn();
                var endDate = new Date(<?php echo json_encode($start_time->format('Y/m/d H:i:s')); ?>);
                //var endDate = new Date('2021/01/10 09:21:00');
                console.log(endDate);
                var interval = 1000;
                function countdownTimer(){
                    var nowDate = new Date();
                    var period = endDate - nowDate ;
                    var addZero = function(n){return('0'+n).slice(-2);}
                    var addZeroDay = function(n){return('0'+n).slice(-3);}
                    if(period >= 0) {
                        var day = Math.floor(period / (1000 * 60 * 60 * 24));
                        period -=  (day　*(1000 * 60 * 60 * 24));
                        var hour = Math.floor(period / (1000 * 60 * 60));
                        period -= (hour *(1000 * 60 * 60));
                        var minutes =  Math.floor(period / (1000 * 60));
                        period -= (minutes * (1000 * 60));
                        var second = Math.floor(period / 1000);
                        var insert = "";
                        insert += '<span class="h">' + addZeroDay(day) +'日' + '</span>';
                        insert += '<span class="h">' + addZero(hour) + '時'+'</span>';
                        insert +=  '<span class="m">' + addZero(minutes) +'分' + '</span>';
                        insert += '<span class="s">' + addZero(second)+ '秒'+ '</span>';
                        document.getElementById('result').innerHTML = insert;
                        setTimeout(countdownTimer,10);
                    }
                    else{
                        $('div#before.js-modal').fadeOut();
                        $('div#at.js-modal').fadeIn();
                        <?php
                        DB::table('contest')->where('Contest_code','=', $code)->update([
                            'status' => 'H',
                            'updated_at' => now()->setTimeZone( new DateTimeZone('Asia/Tokyo'))
                        ]);
                        ?>
                    }
                }
                countdownTimer();

            }
        </script>

