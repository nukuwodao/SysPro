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
        <link rel="stylesheet" href="{{ asset('/css/base.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div>
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a class="nav-logo" href="{{ route('home') }}">
                            <img src="{{ asset('img/png/Color logo - no background.png') }}" alt="NUKUWO" >
                        </a>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="header_button">
                        <ul class="header-SNS">
                            <li><a href="TwitterのURL" class="header_sns_button hd_tw"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="YouTubeのURL" class="header_sns_button hd_yt"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="InstagramのURL" class="header_sns_button hd_it"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="TictokのURL" class="header_sns_button hd_tt"><i class="fab fa-tiktok"></i></a></li>
                            <li><a href="http://line.me/ti/p/%@for7551c" class="header_sns_button hd_li"><i class="fab fa-line"></i></a></li>
                            <li><a href="お問い合わせ先のURL" class="header_sns_button hd_mail"><i class="far fa-envelope"></i></a></li>
                        </ul>
                        <ul class="header-lang">
                            <li class="is-active"><a href=<?php echo url('/'); ?>>JP</a></li>
                            <li><a href="https://enhypen-jp.weverse.io/">KR</a></li>
                        </ul>
                    </div>
                    <ul class="header-link">
                        <li><a href="/register">新規登録</a></li>
                        <li><a href="/login">ログイン</a></li>
                    </ul>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div id="hamburger" class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ '../register' }}" :active="request()->routeIs('dashboard')">
                    {{ __('新規登録') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ '../login' }}" :active="request()->routeIs('dashboard')">
                    {{ __('ログイン') }}
                </x-jet-responsive-nav-link>
            </div>
        </div>
    </nav>
    <section class="t-section">
        <div>
            {{ $slot }}
        </div>
    </section>
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
