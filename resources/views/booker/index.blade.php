@extends('layouts.master')
@section('content')
    <section class="inner-section single-banner" style="background: url(/frontend/images/single-banner.jpg) no-repeat center;">
        <div class="container pt-3">
            <h1>{{$category->name??'Danh sách trang uy tín'}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name??'Danh sách nhà cái'}}</li>
            </ol>
        </div>
    </section>
    <section class="inner-section blog-standard">
        <div class="container">
            <div class="row justify-content-center">
                @if ($hot_bookers->count() > 0)
                    <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                        data-aos-easing="ease-in">
                        <h3 class="sub-title">TOPLIST</h3>
                        <h2 class="title">Nổi Bật</h2>
                    </div>
                @endif
                    <div class="row pt-0">
                        @foreach($hot_bookers as $booker)
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
                        @if ($bookers->count() > 0)
                            <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <h2 class="title">Bookmakers khác</h2>
                            <div class="row pt-3">
                        @endif
                        @foreach($bookers as $booker)
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
                </div>
                <div class="col-sm-10 col-md-7 col-lg-4">
                    <div class="blog-widget">
                        <h3 class="blog-widget-title"></h3>
                        <ul class="blog-widget-feed">
                            <li>ok</li>
                            {{-- @foreach($related as $item)
                            <li>
                                <a class="blog-widget-media" href="/{{$item->slug}}">
                                    <img src="{{$record->images()->first()->url??'/frontend/images/blog/01.jpg'}}" alt="{{$record->images()->first()->title??$record->title}}">
                                </a>
                                <h6 class="blog-widget-text">
                                    <a href="{{$item->url}}">{{$item->title}}</a>
                                    <span>{{date('d/m/Y',strtotime($item->created_at))}}</span>
                                </h6>
                            </li>
                            @endforeach --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection