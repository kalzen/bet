@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('bet/home.css') }}">
    <!-- banner begin -->
    <div class="banner-7">
        <div class="container">
            <div
                class="row justify-content-xxl-between justify-content-xl-between justify-content-lg-between justify-content-md-center">
                <div
                    class="col-xxl-5 col-xl-5 col-lg-5 col-md-8 d-xl-block d-lg-block d-md-flex d-block align-items-center banner-wrapper">
                    <div class="banner-content">
                        <h1 class="title" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <span class="banner-text"> {{ $slides->count() > 0 ? $slides[0]->name : 'Welcome!' }}</span>
                        </h1>
                        <div class="all-btn" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <a class='prd-btn-1 banner-btn'
                                href='{{ $slides->count() > 0 ? $slides[0]->button_url_1 : '/' }}'>{{ $slides->count() > 0 ? $slides[0]->button_name_1 : 'Link 1' }}<i
                                    class="fa-duotone fa-arrow-right"></i></a>
                            <a class='prd-btn-3 banner-btn'
                                href='{{ $slides->count() > 0 ? $slides[0]->button_url_2 : '/' }}'>{{ $slides->count() > 0 ? $slides[0]->button_name_2 : 'Link 2' }}<i
                                    class="fa-duotone fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-12 card-wrapper">

                    <div class="container col-md-12" id="cardContainer">
                        @foreach ($shared_bookers as $booker)
                            <div class="card mb-3" style="border-radius: 10px">
                                <div class="position-absolute top-0 start-0 translate-middle bg-warning rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold fs-6 shadow"
                                    style="width: 1.5rem; height: 1.5rem;">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="booker-wrapper row g-0 align-items-center justify-content-evenly py-0 ps-3">
                                    <div class="col-lg-1 col-md-1 col-1 px-0">
                                        <div class="image-container">
                                            <div class="booker_mini_avt"
                                                style="{{ 'background-image: url(' . $booker->image . ') !important' }}">
                                            </div>
                                            {{-- <img src="{{ $booker->image }}"
                                                class="rounded-circle" alt="Card image"
                                                style="max-width: 50px; height: 50px;"
                                                style="object-fit: cover; object-position: center;"> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 off-set-md-0 offset-1 col-7 ps-0">
                                        <div class="card-body py-1 pl-2">
                                            <small class="card-text text-muted m-0 fw-bold">{{ $booker->name }}</small>
                                            <p class="card-title p-0 m-0 font-weight-bold" style="font-size: 0.9em;">
                                                {{ Str::limit($booker->description, 48, '...') }}</p>
                                            {{-- <small class="card-text text-muted m-0">This is a sample card text content.</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-3 text-end pe-3">
                                        <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1"><small
                                                class="text-small">{{ __('home.view') }}</small></a>
                                        {{-- <a href="{{ route('booker.detail', $code->booker->id) }}" class="prd-btn-1 d-flex mt-3">
                                    <span class="ms-auto me-auto">XEM NGAY<i class="fa-duotone fa-arrow-right"></i></span> 
                                    </a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="part-img position-absolute top-0 w-100 overflow-hidden z-index-n1 d-none d-md-block">
                        <img src="{{ asset('bet/img-shape-7.png') }}" alt="" class="shape-img">
                        {{-- <div class="glitch activate glitch--style-1 img-1">
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                        </div>
                        <div class="glitch activate glitch--style-1 img-2">
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                            <div class="glitch__img"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-1 banner-shape"></div>
        <div class="shape-2 banner-shape"></div>
    </div>
    <!-- banner end -->
    <div class="scroll-down d-none">
        <div class="container">
            <a href="#0" class="scroll-down-btn">
                <span class="straight-line"></span>
                <span class="arrow-icon">
                    <i class="fa-light fa-angle-down"></i>
                    <i class="fa-light fa-angle-down"></i>
                    <i class="fa-light fa-angle-down"></i>
                </span>
            </a>
        </div>
    </div>

    <!-- booker -->
    <div class="booker playing-bet placing-bet-page pb-0 pt-4 mt-1" id="booker">
        <div class="global-shape style-3">
            <img src="assets/img/shapes/shape-1.png" alt="" data-aos="fade-left" data-aos-duration="700"
                data-aos-delay="200">
        </div>
        <div class="container">
            <div class="row top-hot-bookers">
                <div class="col">
                    @if ($hot_bookers->count() > 0)
                        <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <h3 class="sub-title">{{ __('home.bookmaker') }}</h3>
                            <h2 class="title">{{ __('home.top_bookmakers') }}</h2>
                        </div>
                    @endif
                    @include('booker.hot-booker-slider')
                </div>
            </div>
        </div>
        <!-- end booker -->

        <!-- playing bet begin -->
        <div class="playing-bet pt-5 mt-4">
            <div class="global-shape style-2">
                <img src="{{ asset('bet/shape-1.png') }}" alt="" data-aos="fade-left" data-aos-duration="700"
                    data-aos-delay="200" class="aos-init">
            </div>
            <div class="global-shape style-3">
                <img src="{{ asset('bet/shape-1.png') }}" alt="" data-aos="fade-left" data-aos-duration="700"
                    data-aos-delay="200" class="aos-init">
            </div>
            <div class="container">
                <div class="section-title aos-init mb-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <h3 class="sub-title">{{ __('home.news') }}</h3>
                    <h2 class="title mb-3">{{ __('home.latest_sport_news') }}</h2>
                </div>
                @if ($posts->count() > 0)
                    <div class="container mt-4">
                        <div class="row">
                            <!-- Side Small Posts -->
                            <div class="col-lg-4">
                                <div class="row">
                                    @foreach ($posts as $post)
                                        @if ($loop->index == 0)
                                            @continue;
                                        @endif
                                        @if ($loop->index > 3)
                                        @break;
                                    @endif
                                    <div class="col-12 mb-3">
                                        <div class="card border-0">
                                            <div class="row g-0">
                                                <div class="col-7">
                                                    <div class="position-relative"
                                                        style="width: 100%; padding-top: 56.25%;">
                                                        <img src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                                            class="position-absolute top-0 start-0 w-100 h-100 rounded-3 shadow-sm"
                                                            alt="Small Post Image" style="object-fit: cover;"
                                                            onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                                    </div>
                                                </div>
                                                <div class="col-5 side-small-post-content">
                                                    <div class="card-body">
                                                        <span
                                                            class="badge bg-warning text-dark mb-1 mt-1">{{ $post->categories->first()->name }}</span>
                                                        <h6 class="card-title">
                                                            <a href="{{ route('post.detail', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
                                                            <span class="small-post-description">{{ Str::limit($post->description, 60, '...') }}</span>
                                                        </h6>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                    width="10" height="10"
                                                                    viewBox="0 0 24 28">
                                                                    <path
                                                                        d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                                    </path>
                                                                </svg>
                                                                {{ $post->created_at->diffForHumans() }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Main Post -->
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0">
                                <div class="row g-0"
                                    style="
                                        flex-direction: column;
                                        flex-wrap: nowrap;">
                                    <div class="col-md-12">
                                        <div class="position-relative" style="width: 100%; padding-top: 56.25%;">
                                            <img src="{{ $posts[0]->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-3 shadow-sm"
                                                alt="Small Post Image" style="object-fit: cover;"
                                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body main-post-content">
                                            <span
                                                class="badge bg-warning text-dark">{{ $posts[0]->categories->first()->name }}</span>
                                            <h5 class="card-title">
                                                <a href="{{ route('post.detail', ['alias' => $posts[0]->slug]) }}">{{ $posts[0]->title }}</a>
                                            </h5>
                                            <span>{{ Str::limit($posts[0]->description, 255, '...') }}</span>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                        width="19" height="19" viewBox="0 0 24 28">
                                                        <path
                                                            d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                        </path>
                                                    </svg>
                                                    {{ $posts[0]->created_at->diffForHumans() }}
                                                </small>
                                            </p>
                                            {{-- <a href="{{ route('user.detail', ['id' => $posts[0]->user->id]) }}"
                                                    class="d-inline-flex align-items-center">
                                                    <div class="me-2">
                                                        <img src="{{ asset('bet/logo.png') }}" alt=""
                                                            width="20px">
                                                    </div>
                                                    <span class="line-height">{{ $posts[0]->user->name }}</span>
                                                </a> --}}
                                            {{-- <a href="{{ route('post.detail', ['alias' => $posts[0]->slug]) }}"
                                                    class="btn btn-link text-muted text-decoration-none">{{ __('home.read_more') }} >></a> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- size right posts --}}
                        <div class="col-lg-4">
                            <div class="row">
                                @foreach ($posts as $post)
                                    @if ($loop->index <= 3)
                                        @continue;
                                    @endif
                                    @if ($loop->index > 6)
                                    @break;
                                @endif
                                <div class="col-12 mb-3">
                                    <div class="card border-0">
                                        <div class="row g-0">
                                            <div class="col-7">
                                                <div class="position-relative"
                                                    style="width: 100%; padding-top: 56.25%;">
                                                    <img src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded-3 shadow-sm"
                                                        alt="Small Post Image" style="object-fit: cover;"
                                                        onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                                </div>
                                            </div>
                                            <div class="col-5 side-small-post-content">
                                                <div class="card-body">
                                                    <span
                                                        class="badge bg-warning text-dark mb-1 mt-1">{{ $post->categories->first()->name }}</span>
                                                    <h6 class="card-title">
                                                        <a href="{{ route('post.detail', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
                                                        <span class="small-post-description">{{ Str::limit($post->description, 60, '...') }}</span>
                                                    </h6>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="10" height="10"
                                                                viewBox="0 0 24 28">
                                                                <path
                                                                    d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                                </path>
                                                            </svg>
                                                            {{ $post->created_at->diffForHumans() }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <b>{{ __('home.no_posts') }}</b>
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
        <div
            class="col-xl-9 col-lg-9 col-md-7 col-sm-10 d-xl-flex d-lg-flex d-block align-items-center translate-middle-y">
            <div class="part-text">
                <h4 class="title">{{ __('home.promo_code') }}</h4>
            </div>
        </div>
        <div
            class="col-xl-3 col-lg-3 col-md-5 d-xl-flex d-lg-flex d-md-flex d-block align-items-center translate-middle-y">
            <div class="part-btn">
                <a class="prd-btn-1" href="#/faq">{{ __('home.help') }} <i
                        class="fa-regular fa-circle-info"></i></a>
            </div>
        </div>
    </div>
    <div class="row aos-init" data-aos="fade-up" data-aos-delay="50">
        @foreach ($codes as $code)
            <div class="col-md-3">
                <div class="item-promo text-center mx-3 mb-3">
                    <img src="{{ $code->booker->image }}" alt=""
                        onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                    <span style="min-height: 50px; ">{{ $code->description ?? $code->booker->description }}</span>
                    <div class="code mt-4 justify-content-center">
                        {{ $code->name }}
                    </div>
                    <a href="{{ route('booker.detail', $code->booker->id) }}" class="prd-btn-1 d-flex mt-3">
                        <span class="ms-auto me-auto">{{ __('home.view_now') }}<i
                                class="fa-duotone fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
<!-- call to action end -->

<div class="sports-schedule pt-3">
<div class="global-shape style-4">
    <img src="{{ asset('bet/shape-1.png') }}" alt="" data-aos="fade-left" data-aos-duration="1500"
        data-aos-delay="500" class="aos-init">
</div>
<div class="container">
    <div class="section-title aos-init mb-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
        data-aos-easing="ease-in">
        <h3 class="sub-title">{{ __('home.tips') }}</h3>
        <h2 class="title">{{ __('home.today_tips') }}</h2>
    </div>
    @if ($tips->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            <b>{{ __('home.no_tips') }}</b>
        </div>
    @endif
    @foreach ($tips as $tip)
        <div class="card mb-3 p-3 col-md-12 shadow-sm" style="border-radius: 20px;">
            <div class="row d-md-flex justify-content-evenly align-items-center">
                <!-- Date and Time -->
                <div
                    class="col-md-1 text-center d-flex flex-column flex-md-row align-items-center justify-content-center mb-1">
                    <div class="text-muted">
                        <i class="bi bi-clock"></i>🕓 <!-- Bootstrap clock icon -->
                        <br class="d-none d-md-block">
                        <span
                            class="mx-2">{{ strtoupper(\Carbon\Carbon::parse($tip->date)->format('d M')) }}</span>
                        <br class="d-none d-md-block">
                        <span>{{ \Carbon\Carbon::parse($tip->date)->format('h:i A') }}</span>
                    </div>
                </div>

                <!-- Teams -->
                <div class="col-md-3 border-start border-end">
                    <div class="d-flex justify-content-around align-items-center">
                        <img src="{{ asset('bet/logo.png') }}" alt="Team 1" class="me-2" width="30"
                            height="30">
                        <span class="w-75">{{ $tip->name_team_1 }}</span>
                        <span>{{ $tip->score_team_1 }}</span>
                    </div>
                    <div class="d-flex justify-content-around align-items-center mt-2">
                        <img src="{{ asset('bet/logo.png') }}" alt="Team 2" class="me-2" width="30"
                            height="30">
                        <span class="w-75">{{ $tip->name_team_2 }}</span>
                        <span>{{ $tip->score_team_2 }}</span>
                    </div>
                </div>
                <hr class="d-block d-md-none mt-3">
                <!-- Probabilities -->
                <div
                    class="border-end col-md-3 text-center col-6 p-0 d-flex justify-content-evenly align-items-center">
                    <div class="d-inline-block">
                        <span class="text-muted d-block d-md-none">1</span>
                        <div class="text-center py-2 px-3 mx-0 border"
                            style="background-color: rgba(255, 193, 7, {{ floatval($tip->home_bet_rate) / 50 }}); border-radius: 15px;">
                            <span class="text-muted d-none d-md-block">1</span>
                            <span class="d-block d-md-none">{{ $tip->home_bet }}</span>
                            <span class="font-weight-bold">{{ $tip->home_bet_rate }}%</span>
                        </div>
                    </div>

                    <div class="d-inline-block">
                        <span class="text-muted d-block d-md-none">X</span>
                        <div class="text-center py-2 px-3 mx-0 border"
                            style="background-color: rgba(255, 193, 7, {{ floatval($tip->draw_bet_rate) / 50 }}); border-radius: 15px;">
                            <span class="text-muted d-none d-md-block">X</span>
                            <span class="d-block d-md-none">{{ $tip->draw_bet }}</span>
                            <span>{{ $tip->draw_bet_rate }}%</span>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <span class="text-muted d-block d-md-none">2</span>
                        <div class="text-center py-2 px-3 mx-0 border"
                            style="background-color: rgba(255, 193, 7, {{ floatval($tip->guest_bet_rate) / 50 }}); border-radius: 15px;">
                            <span class="text-muted d-none d-md-block">2</span>
                            <span class="d-block d-md-none">{{ $tip->guest_bet }}</span>
                            <span>{{ $tip->guest_bet_rate }}%</span>
                        </div>
                    </div>
                </div>

                <!-- Betting Odds -->
                <div
                    class="col-md-1 text-center border-end col-0 d-none d-md-flex justify-content-evenly align-items-center">
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
                        <span class="text-muted d-block d-md-none">{{ __('home.prediction') }}</span>
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
                    <a class="prd-btn-1 w-100" href="#/faq"><span
                            class="ms-auto me-auto">{{ __('home.bet') }}</span> </a>
                </div>
            </div>
        </div>
    @endforeach

</div>
</div>
<!-- sports schedule end -->

<!-- testimonial begin -->
{{-- <div class="testimonial">
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
    </div> --}}
<!-- testimonial end -->
@endsection
