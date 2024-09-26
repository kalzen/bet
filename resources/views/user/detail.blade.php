@extends('layouts.master')
@section('meta')
<title>Title</title>
<title>TOP BOOKER LIST</title>
@endsection
@section('content')
{{-- <link rel="stylesheet" href="{{asset ('frontend/css/blog-details.css') }}"> --}}
<div class="prd-breadcrumb">
    <div class="container">
        <div class="brd-content">
            {{-- <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init aos-animate">
                <span class="sub-title">blog details</span>
            </div>    
            <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">Even more and setted see small seven to think...</h2> --}}
            <div class="page-direction">
                <ul>
                    <li>
                        <span class="icon"><i class="fa-solid fa-house"></i></span>
                        <span class="text">Home</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                        <span class="text">user details</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                        data-aos-easing="ease-in">
                        <h3 class="sub-title">CHI TIẾT</h3>
                        <h2 class="title"></h2>
                    </div>
    <section class="inner-section blog-details-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-lg" style="border-radius: 20px">
                        <div class="text-center mb-3">
                            <img src="https://vnbettest.com/bet/logo.png" alt="{{ $user->name }}" class="img-fluid rounded-3 pt-3" style="max-width: 200px">
                          </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $user->name }}</h5>
                            <p class="card-text text-center text-muted">{{ $user->email }}</p>
                            <p class="card-text text-center">{{ $user->description }}</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-8">
                    <h2 class="mb-4">Thông tin về người dùng</h2>
                    <div class="card shadow-lg" style="border-radius: 20px">
                        <div class="card-body">
                            <h5 class="card-title">Giới thiệu</h5>
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