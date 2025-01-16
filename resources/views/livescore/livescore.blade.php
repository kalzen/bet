@extends('layouts.master')
@section('content')
    <section class="inner-section blog-standard">
        <style>
            .prd-breadcrumb .brd-content h1.title {
            font-weight: 700;
            font-size: 46px;
            line-height: 56px;
            letter-spacing: 0.03em;
            color: #FFFFFF;
            position: relative;
            margin-bottom: 0;
            }
            @media (max-width: 1399.98px) {
            .prd-breadcrumb .brd-content h1.title {
                font-size: 42px;
                line-height: 52px;
            }
            }
            @media (max-width: 1199.98px) {
            .prd-breadcrumb .brd-content h1.title {
                font-size: 38px;
                line-height: 48px;
            }
            }
            @media (max-width: 991.98px) {
            .prd-breadcrumb .brd-content h1.title {
                font-size: 34px;
                line-height: 44px;
            }
            }
            @media (max-width: 767.98px) {
            .prd-breadcrumb .brd-content h1.title {
                font-size: 30px;
                line-height: 40px;
                padding-bottom: 34px;
            }
            }
            @media (max-width: 575.98px) {
            .prd-breadcrumb .brd-content h1.title {
                font-size: 26px;
                line-height: 36px;
            }
            }
            @media (max-width: 479.98px) {
            .prd-breadcrumb .brd-content h1.title {
                font-size: 22px;
                line-height: 32px;
                padding-bottom: 3px;
            }
            }
            .prd-breadcrumb .brd-content h1.title:after {
            content: "";
            height: 26px;
            width: 153px;
            background: url("../img/breadcrumb/line.png") left center no-repeat;
            background-size: contain;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            }
            @media (max-width: 1399.98px) {
            .prd-breadcrumb .brd-content h1.title:after {
                height: 24px;
                width: 133px;
            }
            }
            @media (max-width: 991.98px) {
            .prd-breadcrumb .brd-content h1.title:after {
                height: 21px;
                width: 120px;
            }
            }
            @media (max-width: 479.98px) {
            .prd-breadcrumb .brd-content h1.title:after {
                display: none;
            }
            }
        </style>
        <div class="prd-breadcrumb">
            <div class="container">
                <div class="brd-content">
                    <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in"
                        class="aos-init aos-animate">
                        <span class="sub-title">{{ __('home.livescore') }}</span>
                    </div>
                    {{-- <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                        data-aos-easing="ease-in">{{ __('home.livescore') }}</h2> --}}
                    <h1 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                    data-aos-easing="ease-in">{!! $assignedTitle->content ?? __('home.livescore') !!}</h1>
                    <div class="page-direction">
                        <ul>
                            <li>
                                <span class="icon"><i class="fa-solid fa-house"></i></span>
                                <span class="text">{{ __('tip.list.home') }}</span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                                <span class="text">{{ __('home.livescore') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <!-- Left column for categories -->
                {{-- <div class="col-md-3 bg-light p-3">
                    <h4 class="ms-1">Hạng mục</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/booker">Tất cả</a></li>
                        @foreach ($categories as $category)
                            <li class="list-group-item"><a href="{{ route('booker.detail', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}

                <!-- Right column for bookers -->
                <div class="col-md-12">
                    {{-- <h1>{{isset($currentCategory->name)?'Danh sách nhà cái "'.$currentCategory->name.'"':'Danh sách nhà cái'}}</h1> --}}

                    {{-- <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{'Danh sách nhà cái'}}</li>
                    </ol> --}}
                    {{-- <div class="main-content">
                        <div class="row top-hot-bookers">
                            <div class="col">
                                
                                
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row all-bookers">
                        <div class="col">
                            <div class="list-group">
                            <div id="loading-notify" class="alert alert-info text-center mt-5" style="display: none;">
                                {{ __('home.loading') }}
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var loadingNotify = document.getElementById('loading-notify');
                                    loadingNotify.style.display = 'block';
                                    setTimeout(function() {
                                        loadingNotify.style.display = 'none';
                                    }, 3000);
                                });
                            </script>

                            @if (App::getLocale() != 'vi')
                                <iframe src="https://www.scorebat.com/embed/livescore/?token=MTU4NTk2XzE3MjgzNTU0MzdfM2UyMmVmZDNlZTZlZjljOTI5MWIwODgwMTk1MzdkNTgwYWJjNzg3Ng==" frameborder="0" width="100%" height="760" allowfullscreen allow='autoplay; fullscreen' style="width:100%;height:1760px;overflow:show;display:block;padding-top:10px" class="_scorebatEmbeddedPlayer_ container-fluid"></iframe>
                                <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://www.scorebat.com/embed/embed.js?v=arrv'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'scorebat-jssdk'));</script>
                            @else
                                </p>
                                <p>
                                    <script type="text/javascript">
                                        window.aif = {
                                            "site_url": "https://free-livescore.com",
                                            "ajax_url": "https://free-livescore.com/wp-admin/admin-ajax.php",
                                            "live_url": "https://denda.tv/tructiep",
                                            "plugin_url": "https://free-livescore.com/wp-content/plugins/all-in-football/",
                                            "socket_url": "https://free-livescore.com:3000",
                                            "page": "match-live",
                                            "color": "#0a325e",
                                            "full": true,
                                            "sound": false,
                                            "popup": true,
                                            "sort": true,
                                            "type": ["goals", "hdp"],
                                            "format": "ml",
                                            "notify": false,
                                            "audio": 0,
                                            "red": true,
                                            "yellow": false,
                                            "livestream": true
                                        };
                                    </script>
                                    <script type="module" crossorigin
                                        src="https://free-livescore.com/wp-content/plugins/all-in-football/public/chunk/main.js"></script>
                                </p>
                                <link rel="stylesheet"
                                    href="https://free-livescore.com/wp-content/plugins/all-in-football/public/assets/main.css">
                                <div id="app" class="container-fluid"></div>
                                @endif
                            </div>
                        </div>
                    </div> --}}

                    <link rel="stylesheet" href="https://cdn.bettests.com/live-main/assets/position.css?v=1.0">
                    <div id="__livescore">
                        <div class="r football">
                            <div id="app" class="A">
                                <div class="mh" id="match-rows_calendar">
                                    <div class="Rg">
                                        <span class="Ug">
                                            <a data-testid="match-calendar-live" href="#">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fdfdfd" viewBox="0 0 30 20" width="30" height="20">
                                                        <path d="M27 0a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3h24zM5.837 6.25H3.866V14H9.13v-1.627H5.838V6.25zm6.297 0h-1.971V14h1.971V6.25zm3.167 0H13.04L15.538 14h2.492l2.433-7.75h-2.127l-1.445 5.704h-.102L15.301 6.25zm11.379 0h-5.312V14h5.312v-1.584h-3.341v-1.584h3.142v-1.45h-3.142V7.835h3.341V6.251z"/>
                                                    </svg>
                                                </div>
                                            </a>
                                        </span>
                                        <div class="Zg" id="calendar-dates"></div>
                                        <div class="oh" id="match-calendar-dp-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#fdfdfd" viewBox="0 0 20 20" width="18" height="18">
                                                <path d="M5.556 0v1.111h8.889V0h1.111v1.111h1.667a2.778 2.778 0 0 1 2.771 2.587v.009l.006.182v13.333A2.778 2.778 0 0 1 17.222 20H2.778A2.778 2.778 0 0 1 0 17.222V3.889a2.778 2.778 0 0 1 2.778-2.778h1.667V0h1.111zM4.444 2.222H2.777A1.67 1.67 0 0 0 1.11 3.889v13.333a1.67 1.67 0 0 0 1.667 1.667h14.444a1.67 1.67 0 0 0 1.667-1.667V3.889a1.67 1.67 0 0 0-1.667-1.667h-1.667v1.111h-1.111V2.222H5.554v1.111H4.443V2.222zm12.778 14.445H2.778V5.556h14.444v11.111zM6.111 13.333H3.889v2.222h2.222v-2.222zm3.333 0H7.222v2.222h2.222v-2.222zm3.334 0h-2.222v2.222h2.222v-2.222zm3.333 0h-2.222v2.222h2.222v-2.222zM6.111 10H3.889v2.222h2.222V10zm3.333 0H7.222v2.222h2.222V10zm3.334 0h-2.222v2.222h2.222V10zm3.333 0h-2.222v2.222h2.222V10zm-10-3.333H3.889v2.222h2.222V6.667zm3.333 0H7.222v2.222h2.222V6.667zm3.334 0h-2.222v2.222h2.222V6.667zm3.333 0h-2.222v2.222h2.222V6.667z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="matches-container"></div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.bettests.com/live-main/livescore.js?v=1.0"></script>

                </div>
            </div>
        </div>


        <div class="container">
            <div class="col-sm-10 col-md-7 col-lg-4">
                <div class="blog-widget">
                    <h3 class="blog-widget-title"></h3>
                    <ul class="blog-widget-feed">
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
