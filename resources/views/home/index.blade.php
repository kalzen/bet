@extends('layouts.master')
@section('content')
<!-- booker -->
<div class="booker playing-bet placing-bet-page pb-0" id="booker">
    <div class="global-shape style-3">
        <img src="assets/img/shapes/shape-1.png" alt="" data-aos="fade-left" data-aos-duration="700"
            data-aos-delay="200">
    </div>
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
            data-aos-easing="ease-in">
            <h3 class="sub-title">Nhà Cái</h3>
            <h2 class="title">TopList Nhà Cái Cược Uy Tín</h2>
        </div>
        <div class="row">
            @foreach($booker_hot as $booker)
            <div class="col container col-md-4 col-12">
                <div class="card shadow-lg p-3 mb-4 border-0" style="position: relative; border-radius: 20px;">
                    <!-- Circle number -->
                    <div class="position-absolute top-30 start-30  bg-danger rounded-circle" style="width: 60px; height: 60px; line-height: 60px; text-align: center; color: white; font-weight: bold; font-size: 30px">
                      {{ $loop->iteration }}
                    </div>
                    
                    <!-- Image section -->
                    <div class="text-center mb-3">
                      <img src="{{$booker->image}}" alt="Logo" class="img-fluid rounded-3">
                    </div>
                    
                    <!-- Title section -->
                    <div class="text-center mb-3">
                      <h5 class="fw-bold">{{$booker->name}}</h5>
                      <p class="text-warning mb-0">★ ★ ★ ★ ★</p>
                    </div>

                    <!-- Features list section -->
                    <ul class="list-unstyled mb-4 text-center">
                        @foreach (explode(',', $booker->sale_text) as $sale_text)
                        <li class="d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,300,270"
                                style="fill:#40C057;">
                                <g fill="#40c057" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,2c-5.50804,0 -10,4.49196 -10,10c0,5.50804 4.49196,10 10,10c5.50804,0 10,-4.49196 10,-10c0,-5.50804 -4.49196,-10 -10,-10zM12,4.5c4.15695,0 7.5,3.34306 7.5,7.5c0,4.15694 -3.34305,7.5 -7.5,7.5c-4.15695,0 -7.5,-3.34306 -7.5,-7.5c0,-4.15694 3.34305,-7.5 7.5,-7.5zM15.22461,9.23828c-0.32482,0.00981 -0.63305,0.14571 -0.85937,0.37891l-3.36523,3.36328l-0.87891,-0.87695c-0.31352,-0.32654 -0.77908,-0.45808 -1.21713,-0.34388c-0.43805,0.1142 -0.78013,0.45628 -0.89433,0.89433c-0.1142,0.43805 0.01734,0.9036 0.34388,1.21713l1.76172,1.76367c0.23451,0.23493 0.55282,0.36695 0.88477,0.36695c0.33194,0 0.65026,-0.13202 0.88477,-0.36695l4.24805,-4.25c0.37007,-0.35931 0.48147,-0.90902 0.28048,-1.38405c-0.20099,-0.47503 -0.67311,-0.77785 -1.18868,-0.76243z"></path></g></g>
                            </svg>
                            {{$sale_text}}
                        </li>
                        @endforeach
                    </ul>
                    <div class="d-flex gap-2 justify-content-center align-items-center mt-3">
                        <a href="{{$booker->url}}" class="prd-btn-1 d-flex">
                            Chi tiết <i class="fa-duotone fa-arrow-right"></i>
                        </a>
                        <a href="{{$booker->url}}" class="prd-btn-2 d-flex">
                            Bet <i class="fa-duotone fa-arrow-right"></i>
                        </a>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
    </div>
    <!-- end booker -->

    <!-- playing bet begin -->
    <div class="playing-bet">
        <div class="global-shape style-2">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="700"
                data-aos-delay="200" class="aos-init">
        </div>
        <div class="global-shape style-3">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="700"
                data-aos-delay="200" class="aos-init">
        </div>
        <div class="container">
            <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                data-aos-easing="ease-in">
                <h3 class="sub-title">Tin Tức</h3>
                <h2 class="title">Tin Thể Thao Mới Nhất</h2>
            </div>
                @if ($posts->count() > 0)
                <div class="container mt-4">
                    <div class="row">
                        <!-- Main Post -->
                        <div class="col-lg-8 mb-4">
                            <div class="card h-100 border-0">
                                <div class="row g-0 h-100">
                                    <div class="col-md-6">
                                        <img src="{{$posts[0]->images->first()->url??'https://via.placeholder.com/400x300'}}" class="img-fluid h-100 w-100 rounded-3 shadow-sm" alt="{{ $posts[0]->images->first()->title }}" style="object-fit: cover;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <span class="badge bg-warning text-dark mb-2">{{ $posts[0]->categories->first()->name }}</span>
                                            <h5 class="card-title"><a href="{{route('post.detail', ['alias' => $posts[0]->slug])}}"> {{$posts[0]->title}}</a></h5>
                                            <p class="card-text">{{ $posts[0]->description }}</p>
                                            <p class="card-text"><small class="text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="19" height="19" viewBox="0 0 24 28">
                                                    <path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z"></path>
                                                    </svg>
                                                {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                                                    <a href="#" class="d-inline-flex align-items-center">
                                                        <div class="me-2">
                                                            <img src="{{asset('bet/logo.png')}}" alt="" width="20px">
                                                        </div>
                                                        <span class="line-height">{{ $posts[0]->user->name }}</span>
                                                    </a> <br>
                                            <a href="{{route('post.detail', ['alias' => $posts[0]->slug])}}" class="btn btn-link text-muted text-decoration-none">Read more >></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Side Small Posts -->
                        <div class="col-lg-4">
                            <div class="row">
                                @php
                                    $posts = $posts->slice(1);
                                @endphp
                                @foreach($posts as $post)
                                @if($loop->index >= 2)
                                    @php
                                        $posts = $posts->slice(1);
                                        $posts = $posts->slice(1);
                                    @endphp
                                    @break;
                                @endif
                                <div class="col-12 mb-3">
                                    <div class="card h-100 border-0">
                                        <div class="row g-0 h-100">
                                            <div class="col-4">
                                                <img src="{{$post->images->first()->url??'https://via.placeholder.com/150x100'}}" class="img-fluid h-100 w-100 rounded-3 shadow-sm" alt="Small Post Image" style="object-fit: cover;">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <span class="badge bg-warning text-dark mb-2">{{ $post->categories->first()->name }}</span>
                                                    <h6 class="card-title"><a href="{{route('post.detail', ['alias' => $post->slug])}}">{{$post->title}}</a></h6>
                                                    <p class="card-text"><small class="text-muted">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="19" height="19" viewBox="0 0 24 28">
                                                        <path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z"></path>
                                                        </svg>
                                                    {{ $post->created_at->diffForHumans() }}</small></p>
                                                    <a href="#" class="d-inline-flex align-items-center">
                                                        <div class="me-2">
                                                            <img src="{{asset('bet/logo.png')}}" alt="" width="20px">
                                                        </div>
                                                        <span class="line-height">{{ $post->user->name }}</span>
                                                    </a> <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                
                    <!-- Bottom Posts (4-6 posts) -->
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-4 mb-3">
                            <div class="card h-100 border-0">
                                <div class="row g-0 h-100">
                                    <div class="col-4">
                                        <img src="{{$post->images->first()->url??'https://via.placeholder.com/150x100'}}" class="img-fluid h-100 w-100 rounded-3 shadow-sm" alt="Small Post Image" style="object-fit: cover;">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <span class="badge bg-warning text-dark mb-2">{{ $post->categories->first()->name }}</span>
                                            <h6 class="card-title"><a href="{{route('post.detail', ['alias' => $post->slug])}}">{{$post->title}}</a></h6>
                                            <p class="card-text"><small class="text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="19" height="19" viewBox="0 0 24 28">
                                                    <path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z"></path>
                                                    </svg>
                                                {{ $post->created_at->diffForHumans() }}</small></p>
                                                <a href="#" class="d-inline-flex align-items-center">
                                                    <div class="me-2">
                                                        <img src="{{asset('bet/logo.png')}}" alt="" width="20px">
                                                    </div>
                                                    <span class="line-height">{{ $post->user->name }}</span>
                                                </a> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        <b>Hiện không có tin mới. Hãy ghé thăm sau!</b>
                    </div>
                </div>
                @endif
            </div>
            <!-- blog posts end -->

        </div>
    </div>
    <!-- playing bet end -->
<!-- call to action begin -->
    <div class="call-to-action">
        <div class="container">
            <div class="row justify-content-center aos-init" data-aos="fade-up" data-aos-delay="50"
                data-aos-duration="500" data-aos-easing="ease-in">
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-10 d-xl-flex d-lg-flex d-block align-items-center translate-middle-y">
                    <div class="part-text">
                        <h4 class="title">Promo Code</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 d-xl-flex d-lg-flex d-md-flex d-block align-items-center translate-middle-y">
                    <div class="part-btn">
                        <a class="prd-btn-1" href="#/faq">Trợ Giúp <i class="fa-regular fa-circle-info"></i></a>
                    </div>
                </div>
            </div>
            <div class="row aos-init" data-aos="fade-up" data-aos-delay="50">
                @foreach( $codes as $code )
                <div class="col-md-3">
                    <div class="item-promo text-center">
                        <img src="data:image/jpeg;base64,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" alt="">
                        <span>{{ $code->description }} <br> {!! $code->content !!}</span>
                        <div class="code mt-4 justify-content-center">
                            {{ $code->name }}
                        </div>
                        <a href="" class="prd-btn-1 d-flex mt-3">
                            <span class="ms-auto me-auto">Claim<i class="fa-duotone fa-arrow-right"></i></span> 
                            </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- call to action end -->

    <div class="sports-schedule pb-1">
        <div class="global-shape style-4">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="1500"
                data-aos-delay="500" class="aos-init">
        </div>
        <div class="container">
            <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                data-aos-easing="ease-in">
                <h3 class="sub-title">TIPS</h3>
                <h2 class="title">Tips hôm nay</h2>
            </div>
            @foreach ($tips as $tip)
            <div class="card mb-3 p-3 col-md-12 shadow-sm" style="border-radius: 20px;">
                <div class="row d-md-flex justify-content-evenly align-items-center">
                    <!-- Date and Time -->
                    <div class="col-md-1 text-center d-flex flex-column flex-md-row align-items-center justify-content-center mb-1">
                        <div class="text-muted">
                            <i class="bi bi-clock"></i>🕓 <!-- Bootstrap clock icon -->
                            <br class="d-none d-md-block">
                            <span class="mx-2">{{ strtoupper(\Carbon\Carbon::parse($tip->date)->format('d M')) }}</span>
                            <br class="d-none d-md-block">
                            <span>{{ \Carbon\Carbon::parse($tip->date)->format('h:i A') }}</span>
                        </div>
                    </div>
                    
                    <!-- Teams -->
                    <div class="col-md-3 border-start border-end">
                        <div class="d-flex justify-content-around align-items-center">
                            <img src="{{ asset('bet/logo.png') }}" alt="Team 1" class="me-2" width="30" height="30">
                            <span class="w-75">{{ $tip->name_team_1 }}</span>
                            <span>{{ $tip->score_team_1 }}</span>
                        </div>
                        <div class="d-flex justify-content-around align-items-center mt-2">
                            <img src="{{ asset('bet/logo.png') }}" alt="Team 2" class="me-2" width="30" height="30">
                            <span class="w-75">{{ $tip->name_team_2 }}</span>
                            <span>{{ $tip->score_team_2 }}</span>
                        </div>
                    </div>
                    <hr class="d-block d-md-none mt-3">
                    <!-- Probabilities -->
                    <div class="border-end col-md-3 text-center col-6 p-0 d-flex justify-content-evenly align-items-center">
                        <div class="d-inline-block">
                            <span class="text-muted d-block d-md-none">1</span>
                            <div class="text-center py-2 px-3 mx-0 border"
                            style="background-color: rgba(255, 193, 7, {{ floatval($tip->home_bet_rate ) / 50 }}); border-radius: 15px;">
                                <span class="text-muted d-none d-md-block">1</span>
                                <span class="d-block d-md-none">{{ $tip->home_bet }}</span>
                                <span class="font-weight-bold">{{ $tip->home_bet_rate }}%</span>
                            </div>
                        </div>
                        
                        <div class="d-inline-block">
                            <span class="text-muted d-block d-md-none">X</span>
                            <div class="text-center py-2 px-3 mx-0 border"
                            style="background-color: rgba(255, 193, 7, {{ floatval($tip->draw_bet_rate ) / 50 }}); border-radius: 15px;">
                                <span class="text-muted d-none d-md-block">X</span>
                                <span class="d-block d-md-none">{{ $tip->draw_bet }}</span>
                                <span>{{ $tip->draw_bet_rate }}%</span>
                            </div>
                        </div>
                        <div class="d-inline-block">
                            <span class="text-muted d-block d-md-none">2</span>
                            <div class="text-center py-2 px-3 mx-0 border"
                            style="background-color: rgba(255, 193, 7, {{ floatval($tip->guest_bet_rate ) / 50 }}); border-radius: 15px;">
                                <span class="text-muted d-none d-md-block">2</span>
                                <span class="d-block d-md-none">{{ $tip->guest_bet }}</span>
                                <span>{{ $tip->guest_bet_rate }}%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Betting Odds -->
                    <div class="col-md-1 text-center border-end col-0 d-none d-md-flex justify-content-evenly align-items-center">
                        <div class="d-inline-block text-center mx-1">
                            <span class="text-muted">1</span>
                            <br>
                            <span class="text-danger">{{ $tip->home_bet }}</span>
                        </div>
                        <div class="d-inline-block text-center mx-1">
                            <span class="text-muted">X</span>
                            <br>
                            <span class="text-danger">{{ $tip->draw_bet }}</span>
                        </div>
                        <div class="d-inline-block text-center mx-1">
                            <span class="text-muted">2</span>
                            <br>
                            <span class="text-danger">{{ $tip->guest_bet }}</span>
                        </div>
                    </div>
                    
                    <div class="col-md-2 text-center col-6 p-0">
                        <div class="d-inline-block">
                            <span class="text-muted d-block d-md-none">Prediction</span>
                            <div class="text-center py-2 px-4 mx-0 border"
                            style="background-color: rgb(52, 53, 72); border-radius: 15px;">
                                <span class="text-light">{{ $tip->recommend }}</span>
                                <br>
                                <span class="text-light">{{ $tip->recommend_rate }}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-block d-md-none"></div>
                    <div class="col-md-2 col-12">
                        <a class="prd-btn-1 w-100" href="#/faq"><span class="ms-auto me-auto">BET</span> </a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <!-- sports schedule end -->

    

    <!-- working process begin -->
    <div class="working-process">
        <div class="global-shape">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400" class="aos-init">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <div class="section-title">
                        <h3 class="sub-title">Hướng Dẫn</h3>
                        <h2 class="title">Cách Đặt Cược Nhanh Gọn</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process">
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="100">
                            <img src="{{asset('bet/icon-1(3).png')}}" alt="">
                        </div>
                        <div class="part-text">
                            <span class="step-number aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="300"><span
                                    class="gradient-number">1.</span></span>
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="150">Mở tài khoản.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="200"
                                class="aos-init">Mở tài khoản miễn phí, nhanh chóng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process pp-2">
                        <div class="part-text">
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="250">Nạp số dư.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="300"
                                class="aos-init">Để có thể sử dụng dịch vụ, bạn phải có <br> ít nhất một chút dư trong tài khoản.</p>
                            <span class="step-number two aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="450"><span
                                    class="gradient-number">2.</span></span>
                        </div>
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="350">
                            <img src="{{asset('bet/icon-2(3).png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process">
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="400">
                            <img src="{{asset('bet/icon-3(3).png')}}" alt="">
                        </div>
                        <div class="part-text">
                            <span class="step-number aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="600"><span
                                    class="gradient-number">3.</span></span>
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="450">Triển khai.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="500"
                                class="aos-init">Bây giờ, bạn có thể thoải mái chọn lựa <br> theo ý muốn của mình.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process pp-2">
                        <div class="part-text">
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="550">Rút tiền.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="600"
                                class="aos-init">Nếu bạn thắng:<br> Hãy nhớ liên hệ với nhà cái trước khi hết hạn sau 12 tháng.</p>
                            <span class="step-number four aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="700"><span
                                    class="gradient-number">4.</span></span>
                        </div>
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="600">
                            <img src="{{asset('bet/icon-4(1).png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- working process end -->

    <!-- feature begin -->
    <div class="feature">
        <div class="global-shape style-2">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="500" class="aos-init">
        </div>
        <div class="container">
            <div class="row justify-content-xl-center justify-content-lg-start">
                <div class="col-xl-5 col-lg-8 col-md-8">
                    <div class="part-left aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                        data-aos-easing="ease-in">
                        <div class="section-title if-lines-break title-white">
                            <h3 class="sub-title">Tại sao nên chọn vnbettests</h3>
                            <h2 class="title">Chúng tôi luôn tự hào khi cung cấp dịch vụ uy tín cho quý khách hàng.</h2>
                        </div>
                        <div class="part-img">
                            <img class="img-shape aos-init" src="{{asset('bet/about-img-shape.png')}}" alt=""
                                data-aos="fade-up-right" data-aos-easing="ease-in" data-aos-duration="500"
                                data-aos-delay="200">
                            <img class="main-img aos-init" src="{{asset('bet/feature-img.png')}}" alt=""
                                data-aos="zoom-in-right" data-aos-easing="ease-in" data-aos-duration="500"
                                data-aos-delay="400">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="feature-list">
                        <div class="row">
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="100" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-1(4).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Tỷ lệ hợp lý</span>
                                        <p>Tỷ lệ được cung cấp tại vnbettests thường tốt hơn so với tỷ lệ của các nhà cái khác.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-2(4).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Xem trực tiếp</span>
                                        <p>Phát trực tiếp cho phép bạn xem các trận đấu bạn đang theo dõi, tăng khả năng sát sao.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-3(4).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Nhiều lựa chọn</span>
                                        <p>Chúng tôi không chỉ cung cấp các lựa chọn cược, mà còn cho phép bạn phát trực tiếp các trận đấu theo thời gian thực.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="250" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-4(2).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Dễ dàng nạp tiền</span>
                                        <p>Khi bạn muốn sử dụng dịch vụ, bạn cần nạp tiền vào tài khoản một lượng tối thiểu.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-5(1).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Rút tiền nhanh gọn</span>
                                        <p>Dễ dàng rút số dư của mình mà không phải chờ đợi lâu.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-6(1).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Đội ngũ hỗ trợ 24/7</span>
                                        <p>Đội ngũ chăm sóc khách hàng của chúng tôi sẵn sàng phục vụ bạn 24/7.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature end -->

    <!-- testimonial begin -->
    <div class="testimonial">
        <div class="global-shape style-3">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400" class="aos-init">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <div class="section-title">
                        <h3 class="sub-title">FEEDBACK</h3>
                        <h2 class="title">Đánh Giá Từ Khách Hàng</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme owl-loaded aos-init" data-aos="fade-up"
                data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in">

                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-2496px, 0px, 0px); transition: all 0s linear 0s; width: 8736px;">
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Leah Stanley</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $425.20</span>
                                        <span class="winning-date">( Tháng 1 - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Megan Clayton</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $99.51</span>
                                        <span class="winning-date">( Tháng 12 - 2021 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-3.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Ruhio S Albert</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $205.20</span>
                                        <span class="winning-date">( Tháng 4 - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-1.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Leah Stanley</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $425.20</span>
                                        <span class="winning-date">( Tháng 1 - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Megan Clayton</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $99.51</span>
                                        <span class="winning-date">( Tháng 12 - 2021 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-3.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Ruhio S Albert</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $205.20</span>
                                        <span class="winning-date">( Tháng 4 - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-1.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Leah Stanley</span>
                                        <span class="lottery-category">Lợi nhuận ước tính: $425.20</span>
                                        <span class="winning-date">( Tháng 1 - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Vì tất cả đều là do may rủi, hãy cứ thoải mái chọn số hoặc để máy chọn dùm.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><img
                            src="{{asset('bet/left-arrow.png')}}"></button><button type="button" role="presentation"
                        class="owl-next"><img src="{{asset('bet/right-arrow.png')}}"></button></div>
                <div class="carousel-custom-dots"><button role="button"
                        class="owl-dot active"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button></div>
            </div>
        </div>
    </div>
    <!-- testimonial end -->
    @endsection