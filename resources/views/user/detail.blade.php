@extends('layouts.master')
@section('meta')
<title>{{ __('user.detail.title') }}</title>
<title>{{ __('user.detail.user_details') }}</title>
@endsection
@section('content')
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
{{-- <link rel="stylesheet" href="{{asset ('frontend/css/blog-details.css') }}"> --}}
<div class="prd-breadcrumb">
    <div class="container">
        <div class="brd-content">
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init aos-animate">
                <span class="sub-title">{{ __('user.detail.overview') }}</span>
            </div>    
            {{-- <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">{{ __('user.detail.user_details') }}</h2> --}}
            <h1 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                    data-aos-easing="ease-in">{!! $assignedTitle->content ?? __('user.detail.user_details') !!}</h1>
            <div class="page-direction">
                <ul>
                    <li>
                        <span class="icon"><i class="fa-solid fa-house"></i></span>
                        <span class="text">{{ __('user.detail.home') }}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                        <span class="text">{{ __('user.detail.user_details') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
        data-aos-easing="ease-in">
        <h3 class="sub-title">{{ __('user.detail.detail') }}</h3>
        <h2 class="title"></h2>
    </div>
    <section class="inner-section blog-details-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-lg" style="border-radius: 20px">
                        <div class="text-center mb-3">
                            <img src="https://bettests.com/userfiles/files/logo.png" alt="{{ $user->name }}" class="img-fluid rounded-3 pt-3" style="max-width: 200px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $user->name }}</h5>
                            <p class="card-text text-center text-muted">{{ $user->email }}</p>
                            <p class="card-text text-center">{{ $user->description }}</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-8">
                    {{-- <h2 class="mb-4">{{ __('user.detail.user_details') }}</h2> --}}
                    <div class="card shadow-lg" style="border-radius: 20px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('user.detail.overview') }}</h5>
                            <p class="card-text">
                                {!! $user->content !!}
                            </p>
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