<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body>
        <header id="header">
            <div class="header-inner">
                <div class="header-bar"> <a href="" class="header-logo"><img src="{{ asset('img/png/Color logo - no background.png') }}" alt="NUKUWO" ></a>
                    <div class="header-icon">
                        <a class="header-menubtn menu3 j-menu">
                            <div class="header-menubtn_inner"> <span class="top"></span> <span class="middle"></span> <span class="bottom"></span> </div>
                        </a>
                    </div>
                </div>
                <nav class="header-nav j-menu_gnav">
                    <ul class="header-page">
                    </ul>
                    <ul class="header-SNS">
                        <li><a href="TwitterのURL" class="sns_button hd_tw"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="YouTubeのURL" class="sns_button hd_yt"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="InstagramのURL" class="sns_button hd_it"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="TictokのURL" class="sns_button hd_tt"><i class="fab fa-tiktok"></i></a></li>
                        <li><a href="http://line.me/ti/p/%@for7551c" class="sns_button hd_li"><i class="fab fa-line"></i></a></li>
                        <li><a href="お問い合わせ先のURL" class="sns_button hd_mail"><i class="far fa-envelope"></i></a></li>
                    </ul>
                    <div class="header-control">
                        <ul class="header-lang">
                            <li class="is-active"><a href="/?lang=ja">JP</a></li>
                            <li><a href="/?lang=en">KR</a></li>
                        </ul>
                        <ul class="header-link">
                            <li><a href="/register">新規登録</a></li>
                            <li><a href="/login">ログイン</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <footer id="footer">
            <div class="t-inner">
                <nav class="footer-nav">
                    <div class="footer_SNS">
                        <ul class="footer_SNS_icon">
                            <li><a href="TwitterのURL" class="sns_button ft_tw"><i class="fab fa-twitter"></i></a><span>Twitter</span></li>
                            <li><a href="YouTubeのURL" class="sns_button ft_yt"><i class="fab fa-youtube"></i></a><span>YouTube</span></li>
                            <li><a href="InstagramのURL" class="sns_button ft_it"><i class="fab fa-instagram"></i></a><span>Instagram</span></li>
                            <li><a href="TictokのURL" class="sns_button ft_tt"><i class="fab fa-tiktok"></i></a><span>TikTok</span></li>
                            <li><a href="http://line.me/ti/p/%@for7551c" class="sns_button ft_li"><i class="fab fa-line"></i></a><span>LINE</span></li>
                            <li><a href="お問い合わせ先のURL" class="sns_button ft_mail"><i class="far fa-envelope"></i></a><span>メール</span></li>
                        </ul>
                    </div>
                    <div class="footer-logo"> <a href="/"><img src="{{ asset('img/png/White logo - no background.png') }}" alt="AtCoder"></a> </div>
                    <div class="footer_flex">
                        <div class="inner">
                            <ul class="footer_link">
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </footer>
    </body>
</html>
