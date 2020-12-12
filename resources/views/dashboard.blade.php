<x-app-layout>
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
                                    <div class="time"><a href="http://www.timeanddate.com/worldclock/fixedtime.html?iso=20201107T1400&p1=248" target="blank"><time class="fixtime-short">11/7(土) 14:00</time></a> 開始</div>
                                </div>
                                <div class="right">
                                </div>
                            </div>
                            <div class="m-list_contest_ttl"> <a href="/contests/future-contest-2021-qual">制シスプログラミングコンテスト1</a> </div>
                        </li>
                    </ul>
                    <div class="a-btnarea left"> <a href="/contests/" class="a-btn_arrow">コンテスト一覧</a> </div>
                </div>
            </div>
            <div class="notice">
                <div class="m-box_inner">
                    <div class="a-title_h2">
                        <h2 class="a-title_ttl">お知らせ</h2>
                    </div>
                    <div class="m-box-news">
                        <div class="m-box-news_ttl"><a href="/posts/549">制シスプログラミングコンテスト1</a></div>
                        <div class="m-box-news_time"> <small>投稿日時:
                                <span class="tooltip-unix" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="" data-original-title="2020/11/1 5:33:43">
<time class="timeago" datetime="2020/11/01 05:33:43">約 18 時間前</time>
</span>
                            </small> </div>
                        <div class="m-box-news_post">
                            <div class="panel-body blog-post">
                                <p><a href="https://atcoder.jp/contests/abc181">制シスプログラミングコンテスト1</a> が開催されます。</p>
                                <ul>
                                    <li>コンテストページ： <a href="https://atcoder.jp/contests/abc181">https://atcoder.jp/contests/abc181</a></li>
                                    <li>開始時刻： <a href="http://www.timeanddate.com/worldclock/fixedtime.html?iso=20201101T2100&p1=248" target="blank"><time class="fixtime-full">2020-11-01(日) 21:00</time></a></li>
                                    <li>コンテスト時間： 100分</li>
                                    <li>問題数： 6</li>
                                </ul>
                                <p>配点は 100-200-300-400-500-600 です。</p>
                                <p>皆様、是非ご参加ください！</p>
                            </div>
                            <div class="a-btnarea center"> <a href="/posts/549" class="a-btn_bg small">詳細を見る</a> </div>
                        </div>
                        <div class="a-btnarea left"> <a href="/home" class="a-btn_arrow">お知らせ一覧</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var userAgent = window.navigator.userAgent.toLowerCase();
        if (userAgent.toLowerCase().indexOf('msie') !== -1 || userAgent.toLowerCase().indexOf('trident') !== -1) {
            var text = 'システム情報科学専攻プログラミングコンテストはInternet Explorerに対応していません。EdgeやChromeやFirefoxなどの別のブラウザをお使いください。\n';
            text += '시스템 정보 과학 전공 프로그래밍 콘테스트는 Internet Explorer에 대응하고 있지 않습니다. Edge 나 Chrome 또는 Firefox와 같은 다른 브라우저를 사용하십시오.';
            alert(text);
        }
    </script>
</x-app-layout>
