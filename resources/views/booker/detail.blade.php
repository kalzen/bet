@extends('layouts.master')
@section('meta')
<title>Title</title>
<title>TOP BOOKER LIST</title>
@endsection
@section('content')
{{-- <link rel="stylesheet" href="{{asset ('frontend/css/blog-details.css') }}"> --}}
<section class="inner-section single-banner">
        <div class="container">
            <h1 class="text-white">Chi tiết trang</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết trang</li>
            </ol>
        </div>
    </section>
    <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                        data-aos-easing="ease-in">
                        <h3 class="sub-title">CHI TIẾT</h3>
                        <h2 class="title"></h2>
                    </div>
    <section class="inner-section blog-details-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card rounded-3 shadow-lg">
                        <div class="text-center mb-3">
                            <img src="{{$booker->image}}" alt="{{ $booker->name }}" class="img-fluid rounded-3">
                          </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $booker->name }}</h5>
                            <p class="card-text">{{ $booker->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Hạng mục:</strong> {{ $booker->categories->first() ? $booker->categories->first()->name : 'Không' }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{$booker->url}}" class="prd-btn-2 d-flex">
                                <span class="ms-auto me-auto">Bet<i class="fa-duotone fa-arrow-right"></i></span> 
                            </a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-8">
                    <h2 class="mb-4">Thông tin về nhà cái</h2>
                    <div class="card rounded-3 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title">Giới thiệu</h5>
                            <p class="card-text">
                                {!! $booker->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="card mt-4 rounded-3 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title">Thông tin thêm:</h5>
                            <ul class="list-group list-group-flush">
                                @foreach (explode(',', $booker->sale_text) as $sale_text)
                                <li class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,300,270"
                                        style="fill:#40C057;">
                                        <g fill="#40c057" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,2c-5.50804,0 -10,4.49196 -10,10c0,5.50804 4.49196,10 10,10c5.50804,0 10,-4.49196 10,-10c0,-5.50804 -4.49196,-10 -10,-10zM12,4.5c4.15695,0 7.5,3.34306 7.5,7.5c0,4.15694 -3.34305,7.5 -7.5,7.5c-4.15695,0 -7.5,-3.34306 -7.5,-7.5c0,-4.15694 3.34305,-7.5 7.5,-7.5zM15.22461,9.23828c-0.32482,0.00981 -0.63305,0.14571 -0.85937,0.37891l-3.36523,3.36328l-0.87891,-0.87695c-0.31352,-0.32654 -0.77908,-0.45808 -1.21713,-0.34388c-0.43805,0.1142 -0.78013,0.45628 -0.89433,0.89433c-0.1142,0.43805 0.01734,0.9036 0.34388,1.21713l1.76172,1.76367c0.23451,0.23493 0.55282,0.36695 0.88477,0.36695c0.33194,0 0.65026,-0.13202 0.88477,-0.36695l4.24805,-4.25c0.37007,-0.35931 0.48147,-0.90902 0.28048,-1.38405c-0.20099,-0.47503 -0.67311,-0.77785 -1.18868,-0.76243z"></path></g></g>
                                    </svg>
                                    {{$sale_text}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-10">
                    <article class="blog-details">
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection