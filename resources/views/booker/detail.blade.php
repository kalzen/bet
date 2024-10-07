@extends('layouts.master')
@section('meta')
<title>{{ __('booker.list.title') }}</title>
<title>{{ __('booker.list.bookmaker_details') }}</title>
@endsection
@section('content')
<div class="prd-breadcrumb">
    <div class="container">
        <div class="brd-content">
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init aos-animate">
                <span class="sub-title">{{ __('booker.list.bookmaker') }}</span>
            </div>    
            <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">{{ __('booker.detail.bookmaker_details') }}</h2>
            <div class="page-direction">
                <ul>
                    <li>
                        <span class="icon"><i class="fa-solid fa-house"></i></span>
                        <span class="text">{{ __('booker.list.home') }}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                        <span class="text">{{ __('booker.list.detail') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="inner-section single-banner">
    </section>
    <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
        data-aos-easing="ease-in">
        <h3 class="sub-title">{{ __('booker.list.detail') }}</h3>
        <h2 class="title"></h2>
    </div>
    <section class="inner-section blog-details-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-lg" style="border-radius: 20px">
                        <div class="text-center mb-3">
                            <img src="{{$booker->image}}" alt="{{ $booker->name }}" class="img-fluid pt-3" style="max-width: 200px; border-radius: 20px" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $booker->name }}</h5>
                            <p class="card-text">{{ $booker->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>{{ __('booker.detail.category') }}:</strong> {{ $booker->categories->first() ? $booker->categories->first()->name : __('booker.list.no') }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{$booker->url}}" class="prd-btn-2 d-flex">
                                <span class="ms-auto me-auto">{{ __('booker.list.bet') }}<i class="fa-duotone fa-arrow-right"></i></span> 
                            </a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-8">
                    {{-- <h2 class="mb-4 mt-1">{{ __('booker.detail.bookmaker_details') }}</h2> --}}
                    <div class="card shadow-lg" style="border-radius: 20px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('booker.detail.overview') }}</h5>
                            <p class="card-text">
                                {!! $booker->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="card mt-4 shadow-lg" style="border-radius: 20px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('booker.detail.additional_infos') }}:</h5>
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
                    @if ($booker->codes->count() > 0)
                        <h2 class="mb-0 pt-5 mt-5">{{ __('booker.detail.bookmaker_promo_codes') }}</h2>
                    @endif
                </div>
                <div class="col-12 pt-5 pb-5">
                    <div class="row aos-init" data-aos="fade-up" data-aos-delay="50">
                        @foreach( $booker->codes as $code )
                        <div class="col-md-3">
                            <div class="item-promo text-center">
                                <img src="{{ $code->booker->image }}" alt="">
                                <span>{{ $code->description ?? $code->booker->description }}</span>
                                <div class="code mt-4 justify-content-center">
                                    {{ $code->name }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection