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
                        <span class="sub-title">{{ __('home.leaderboard') }}</span>
                    </div>
                    <h1 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                    data-aos-easing="ease-in">{!! $assignedTitle->content ?? __('home.live_leaderboard') !!}</h1>
                    <div class="page-direction">
                        <ul>
                            <li>
                                <span class="icon"><i class="fa-solid fa-house"></i></span>
                                <span class="text">{{ __('tip.list.home') }}</span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                                <span class="text">{{ __('home.leaderboard') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
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

                    <div class="row all-bookers">
                        <div class="col">
                            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
                                    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
                                </script> --}}
                            </p>
                            <p>
                                <script type="text/javascript">
                                    window.aif = {
                                        "site_url": "https://free-livescore.com",
                                        "ajax_url": "https://free-livescore.com/wp-admin/admin-ajax.php",
                                        "live_url": "https://denda.tv/tructiep",
                                        "plugin_url": "https://free-livescore.com/wp-content/plugins/all-in-football/",
                                        "socket_url": "https://free-livescore.com:3000",
                                        "page": "season-standing",
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
                            <div id="app"></div>
                        </div>
                    </div>
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
    <style>
        .aif-bs tr.header[data-v-053fb909] {
            color: var(--3110e7e3) !important;
            z-index: 0;
        }
    </style>
@endsection
