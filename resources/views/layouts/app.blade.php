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
        <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/base.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/contest.css') }}">
        <link rel="stylesheet" href="{{ asset('lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/mbo.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('lib/codemirror.js') }}"></script>
        <script src="{{ asset('mode/clike/clike.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('js/timeago.js') }}"></script>
        <script src="{{ asset('easytimer.js-master/dist/easytimer.js') }}"></script>
        <script src="{{ asset('js/countdown.js') }}"></script>
        <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
            tex2jax: {
                inlineMath: [ ['$','$'], ['\\(','\\)'] ],
                processEscapes: true
            }
        });
        </script>
        <script type="text/javascript" async
                src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS_CHTML">
        </script>
    </head>
    <body class="font-sans antialiased">
    <div class="bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Content -->
        {{ $slot }}
    </div>

    @stack('modals')

    @livewireScripts
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
                            <li><a href=<?php echo url('/'); ?>><i class="fas fa-home"></i>ホーム</a></li>
                            <li><a href=<?php echo url('/contest'); ?>><i class="fas fa-award"></i>コンテスト一覧</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </footer>
</html>
