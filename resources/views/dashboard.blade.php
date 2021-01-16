<x-app-layout>
    <?php
    $contest = DB::table('contest')->where('status',"!=",'P')->orderBy('updated_at','desc')->first();
    $start_time = DateTime::createFromFormat('Y-m-d H:i:s', $contest->star);
    $end_time = DateTime::createFromFormat('Y-m-d H:i:s', $contest->end);
    $create_time = DateTime::createFromFormat('Y-m-d H:i:s', $contest->created_at);
    $contest_time = $contest->contest_time;
    $out_format = $start_time->format('Y年m月d日(D) H:i');
    $cre_time = $create_time->format("Y-m-d")."T".$create_time->format("H:m:s");
    ?>
    <section id="keyvisual">
        <div class="keyvisual-inner">
            <div class="keyvisual-grid">
                <div class="keyvisual-logo"><img src="{{ asset('img/png/White logo - no background.png') }}" alt="制シス"></div>
                <h1 class="keyvisual-copy">制シス<br class="sp">プログラミングコンテスト</h1>
                <div class="keyvisual-txt">このサイトは、システム情報科学専攻でのプログラミングコンテストサイトページです。<br></div>
            </div>
        </div>
    </section>
    <section class="t-section">
        <div class="t-inner">
            <div class="a-title_h1">
                <h1 class="a-title_ttl"><i class="fas fa-award"></i>コンテスト</h1>
            </div>
        </div>
        <div class="contest_bar">
            <div class="new-contest">
                <div class="m-box_inner">
                    <div class="a-title_h2">
                        <h2 class="a-title_ttl">最新コンテスト</h2>
                    </div>
                    <ul class="m-list_contest">
                        <li>
                            <div class="m-list_contest_info">
                                <div class="left">
                                    <div class="status"> 予定</div>
                                    <div class="time"><a><time class="fixtime-short"></time></a><?php echo $out_format; ?> 開始</div>
                                </div>
                                <div class="right">
                                </div>
                            </div>
                            <div class="m-list_contest_ttl"> <a href=<?php echo url('/spc001/top'); ?>>SystemInfo. Programing Contest 001</a> </div>
                        </li>
                    </ul>
                    <div class="a-btnarea left"> <a href=<?php echo url('/contest'); ?> class="icon icon-after icon-chevronright">コンテスト一覧<i class="fas fa-chevron-circle-right"></i></a> </div>
                </div>
            </div>
            <div class="notice">
                <div class="m-box_inner">
                    <div class="a-title_h2">
                        <h2 class="a-title_ttl">お知らせ</h2>
                    </div>
                    <div class="m-box-news">
                        <div class="m-box-news_ttl"><a href=<?php echo url('/notice'); ?> class="btn btn-flat"><span>SystemInfo. Programing Contest 001</span></a></div>
                        <div class="m-box-news_time"> <small>投稿日時:
                                <span class="tooltip-unix" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="" data-original-title="2020/11/1 5:33:43">
                                    <time id="created_at" class="timeago" datetime=<?php echo $cre_time;?>></time>
                                </span>
                            </small> </div>
                        <div class="m-box-news_post">
                            <div class="panel-body blog-post">
                                <p><a href=<?php echo url('/spc001/top'); ?>>SystemInfo. Programing Contest 001</a> が開催されます。</p>
                                <ul>
                                    <li>コンテストページ： <a href=<?php echo url('/spc001/top'); ?> ><?php echo url('/spc001/top'); ?></a></li>
                                    <li>開始時刻： <a  target="blank"><time ><?php echo $out_format;?></time></a></li>
                                    <li>コンテスト時間： <?php echo $contest->contest_time; ?>分</li>
                                    <li>問題数： 5</li>
                                </ul>
                                <p>配点は 100-100-200-200-400 です。</p>
                                <p>皆様、是非ご参加ください！</p>
                            </div>
                            <div class="a-btnarea center"> <a href=<?php echo url('/notice'); ?> class="a-btn_bg small">詳細を見る</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        </script>
    <script>
        var userAgent = window.navigator.userAgent.toLowerCase();
        if (userAgent.toLowerCase().indexOf('msie') !== -1 || userAgent.toLowerCase().indexOf('trident') !== -1) {
            var text = 'システム情報科学専攻プログラミングコンテストはInternet Explorerに対応していません。EdgeやChromeやFirefoxなどの別のブラウザをお使いください。\n';
            text += '시스템 정보 과학 전공 프로그래밍 콘테스트는 Internet Explorer에 대응하고 있지 않습니다. Edge 나 Chrome 또는 Firefox와 같은 다른 브라우저를 사용하십시오.';
            alert(text);
        }
    </script>
</x-app-layout>
