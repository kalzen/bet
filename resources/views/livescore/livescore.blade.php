@extends('layouts.master')
@section('content')
    <section class="inner-section blog-standard">
        <div class="prd-breadcrumb">
            <div class="container">
                <div class="brd-content">
                    <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in"
                        class="aos-init aos-animate">
                        <span class="sub-title">{{ __('home.livescore') }}</span>
                    </div>
                    <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                        data-aos-easing="ease-in">{{ __('home.livescore') }}</h2>
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

                    <div class="row all-bookers">
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
@endsection
