<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()-)->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </body>
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
                            <li class="f-active"><i class="fas fa-home"></i><a href="/home">ホーム</a></li>
                            <li><i class="fas fa-award"></i><a href="/contests/">コンテスト一覧</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
    </footer>
</html>
