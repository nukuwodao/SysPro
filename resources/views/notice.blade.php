<x-app-layout>
    <?php
    function console_log( $data ) {
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
    $contest = DB::table('contest')->where('status','!=','P')->orderBy('updated_at','desc')->first();
    $data = $contest->Contest_code;
    /*相対パスから絶対パス*/
    $path = url("/".$contest->Contest_code."/top");
    /*時間の変換*/
    $time = DateTime::createFromFormat('Y-m-d H:i:s', $contest->star);
    $c_time = $time->format('Y年m月d日(D) H:i');
    $time2 = DateTime::createFromFormat('Y-m-d H:i:s', $contest->end);
    $now_time = new DateTime('now');
    $now_time->setTimeZone( new DateTimeZone('Asia/Tokyo'));
    $p = $time->diff($time2);
    $e = $p->h*60 + $p->i;
    $update_time = DateTime::createFromFormat('Y-m-d H:i:s', $contest->updated_at);
    $create_time = DateTime::createFromFormat('Y-m-d H:i:s', $contest->created_at);
    $up_time = $create_time->format("Y-m-d")."T".$create_time->format("H:m:s");
    $u_time = $update_time->format("Y-m-d")."T".$update_time->format("H:m:s");
    console_log($u_time);
    ?>
    <section class="t-section">
        <div id="MathJax_Message" style="display: none;"></div>
        <script type="text/javascript" src="https://cdn.d2-apps.net/js/tr.js" async=""></script>
        <div id="main-div" class="float-container">
            <div id="main-container" class="container is-new_header" style="">
                <div class="row">
                    <div id="pien" class="mt-2 col-sm-10 ">
                        <div class="panel panel-default">
                            <div class="panel-heading post-heading">
                                <h3 class="panel-title"><a href=<?php echo $path?>><?php echo $contest->Contest_name ?></a></h3> <small>投稿日時:
                                    <span class="tooltip-unix" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="" data-original-title="2021/1/8 21:59:41">
                                    <time id = 'created_at' class="timeago" datetime=<?php echo $up_time ?>></time>
                                </span>
                                </small>
                            </div>
                            <div class="panel-body blog-post">
                                <p><a href=<?php echo $path?>><?php echo $contest->Contest_name ?></a> が開催されます。</p>
                                <ul>
                                    <li>コンテストページ： <a href=<?php echo $path ?>><?php echo $path ?></a></li>
                                    <li>開始時刻： <a class="contest_time"><?php echo $c_time ?></a></li>
                                    <li>コンテスト時間： <?php echo $e ?> 分 </li>
                                    <li>問題数： <?php echo $contest->num ?></li>
                                </ul>
                                <p>配点は <?php echo $contest->allocation ?> です。</p>
                                <p>皆様、是非ご参加ください！</p>
                            </div>
                            <div class="panel-footer post-footer">
                                <small>最終更新:
                                    <span class="tooltip-unix" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="" data-original-title="2021/1/8 21:59:41">
                                    <time id='updated_at' class="timeago" datetime=<?php echo $u_time ?>></time>
                                </span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-4"></div>
            </div>
            <hr>
        </div>
    </section>
        <script>
            // Japanese setting for Timeago
            $.timeago.settings.strings = {
                prefixAgo: "",
                prefixFromNow: "今から",
                suffixAgo: "",
                suffixFromNow: "後",
                seconds: "1 分未満",
                minute: "約 1 分",
                minutes: "%d 分",
                hour: "約 1 時間",
                hours: "約 %d 時間",
                day: "約 1 日",
                days: "約 %d 日",
                month: "約 1 月",
                months: "約 %d 月",
                year: "約 1 年",
                years: "約 %d 年",
                wordSeparator: ""
            };
        </script>
    <script type="text/javascript">
        $('#created_at').timeago();
        $('#updated_at').timeago();
    </script>
</x-app-layout>
