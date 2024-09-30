@extends('layouts.master')
@section('content')

    <!-- banner begin -->
    <div class="banner-7">
        <div class="container">
            <div
                class="row justify-content-xxl-between justify-content-xl-between justify-content-lg-between justify-content-md-center">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-8 d-xl-block d-lg-block d-md-flex d-block align-items-center banner-wrapper">
                    <div class="banner-content">
                        <h1 class="title" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <span class="banner-text"> {{ $slides->count() > 0 ? $slides[0]->name : 'Welcome!' }}</span>
                        </h1>
                        <div class="all-btn" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <a class='prd-btn-1'
                                href='{{ $slides->count() > 0 ? $slides[0]->button_url_1 : '/' }}'>{{ $slides->count() > 0 ? $slides[0]->button_name_1 : 'Link 1' }}<i
                                    class="fa-duotone fa-arrow-right"></i></a>
                            <a class='prd-btn-3'
                                href='{{ $slides->count() > 0 ? $slides[0]->button_url_2 : '/' }}'>{{ $slides->count() > 0 ? $slides[0]->button_name_2 : 'Link 2' }}<i
                                    class="fa-duotone fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-12 card-wrapper">

                    <div class="container col-md-12" id="cardContainer">
                        @foreach ($shared_bookers as $booker)
                            <div class="card mb-3" style="border-radius: 20px">
                                <div class="position-absolute top-0 start-0 translate-middle bg-warning rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold fs-6 shadow"
                                    style="width: 1.5rem; height: 1.5rem;">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="row g-0 align-items-center justify-content-evenly ps-3 py-0">
                                    <div class="col-md-1 col-2 px-0">
                                        <div class="image-container">
                                            <div class="booker_mini_avt" style="{{ 'background-image: url(' . $booker->image . ')' }}"></div>
                                            {{-- <img src="{{ $booker->image }}"
                                                class="rounded-circle" alt="Card image"
                                                style="max-width: 50px; height: 50px;"
                                                style="object-fit: cover; object-position: center;"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <div class="card-body py-1 pl-2">
                                            <small class="card-text text-muted m-0 fw-bold">{{ $booker->name }}</small>
                                            <p class="card-title p-0 m-0 font-weight-bold" style="font-size: 0.9em;">
                                                {{ $booker->description }}</p>
                                            {{-- <small class="card-text text-muted m-0">This is a sample card text content.</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-3 text-center">
                                        <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1"><small
                                                class="text-small">Xem</small></a>
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
    <div class="scroll-down">
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
    <div class="booker playing-bet placing-bet-page pb-0 pt-5 mt-4" id="booker">
        <div class="global-shape style-3">
            <img src="assets/img/shapes/shape-1.png" alt="" data-aos="fade-left" data-aos-duration="700"
                data-aos-delay="200">
        </div>
        <div class="container">
            <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                data-aos-easing="ease-in">
                <h3 class="sub-title">Nhà Cái</h3>
                <h2 class="title">TopList Nhà Cái Cược Uy Tín</h2>
            </div>
            <div class="row">
                @foreach ($booker_hot as $booker)
                    <div class="col container col-md-4 col-12">
                        <div class="card shadow-lg p-3 mb-4 border-0" style="position: relative; border-radius: 20px;">
                            <div class="position-absolute top-30 start-30  bg-danger rounded-circle"
                                style="width: 60px; height: 60px; line-height: 60px; text-align: center; color: white; font-weight: bold; font-size: 30px">
                                {{ $loop->iteration }}
                            </div>

                            <div class="text-center mb-3">
                                <img src="{{ $booker->image }}" alt="Logo" class="img-fluid rounded-3"
                                    onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                            </div>

                            <div class="text-center mb-3">
                                <h5 class="fw-bold">{{ $booker->name }}</h5>
                                <p class="text-warning mb-0">★ ★ ★ ★ ★</p>
                            </div>

                            <ul class="list-unstyled mb-4 text-center">
                                @foreach (explode(',', $booker->sale_text) as $sale_text)
                                    <li class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30"
                                            height="30" viewBox="0,0,300,270" style="fill:#40C057;">
                                            <g fill="#40c057" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                font-weight="none" font-size="none" text-anchor="none"
                                                style="mix-blend-mode: normal">
                                                <g transform="scale(10.66667,10.66667)">
                                                    <path
                                                        d="M12,2c-5.50804,0 -10,4.49196 -10,10c0,5.50804 4.49196,10 10,10c5.50804,0 10,-4.49196 10,-10c0,-5.50804 -4.49196,-10 -10,-10zM12,4.5c4.15695,0 7.5,3.34306 7.5,7.5c0,4.15694 -3.34305,7.5 -7.5,7.5c-4.15695,0 -7.5,-3.34306 -7.5,-7.5c0,-4.15694 3.34305,-7.5 7.5,-7.5zM15.22461,9.23828c-0.32482,0.00981 -0.63305,0.14571 -0.85937,0.37891l-3.36523,3.36328l-0.87891,-0.87695c-0.31352,-0.32654 -0.77908,-0.45808 -1.21713,-0.34388c-0.43805,0.1142 -0.78013,0.45628 -0.89433,0.89433c-0.1142,0.43805 0.01734,0.9036 0.34388,1.21713l1.76172,1.76367c0.23451,0.23493 0.55282,0.36695 0.88477,0.36695c0.33194,0 0.65026,-0.13202 0.88477,-0.36695l4.24805,-4.25c0.37007,-0.35931 0.48147,-0.90902 0.28048,-1.38405c-0.20099,-0.47503 -0.67311,-0.77785 -1.18868,-0.76243z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        {{ $sale_text }}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="d-flex gap-2 justify-content-center align-items-center mt-3">
                                <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1 d-flex">
                                    Chi tiết <i class="fa-duotone fa-arrow-right"></i>
                                </a>
                                <a href="{{ $booker->url }}" class="prd-btn-2 d-flex">
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
                    <h3 class="sub-title">Tin Tức</h3>
                    <h2 class="title mb-3">Tin Thể Thao Mới Nhất</h2>
                </div>
                @if ($posts->count() > 0)
                    <div class="container mt-4">
                        <div class="row">
                            <!-- Main Post -->
                            <div class="col-lg-8 mb-4">
                                <div class="card h-100 border-0">
                                    <div class="row g-0 h-100">
                                        <div class="col-md-6">
                                            <img src="{{ $posts[0]->images->first()->url ?? 'https://via.placeholder.com/400x300' }}"
                                                class="img-fluid h-100 w-100 rounded-3 shadow-sm"
                                                alt="{{ $posts[0]->images->first()->title }}" style="object-fit: cover;"
                                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <span
                                                    class="badge bg-warning text-dark mb-2">{{ $posts[0]->categories->first()->name }}</span>
                                                <h5 class="card-title"><a
                                                        href="{{ route('post.detail', ['alias' => $posts[0]->slug]) }}">
                                                        {{ $posts[0]->title }}</a></h5>
                                                <p class="card-text">{{ $posts[0]->description }}</p>
                                                <p class="card-text"><small class="text-muted">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="19" height="19" viewBox="0 0 24 28">
                                                            <path
                                                                d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                            </path>
                                                        </svg>
                                                        {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                                                <a href="{{ route('user.detail', ['id' => $posts[0]->user->id]) }}"
                                                    class="d-inline-flex align-items-center">
                                                    <div class="me-2">
                                                        <img src="{{ asset('bet/logo.png') }}" alt=""
                                                            width="20px">
                                                    </div>
                                                    <span class="line-height">{{ $posts[0]->user->name }}</span>
                                                </a> <br>
                                                <a href="{{ route('post.detail', ['alias' => $posts[0]->slug]) }}"
                                                    class="btn btn-link text-muted text-decoration-none">Read more >></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Side Small Posts -->
                            <div class="col-lg-4">
                                <div class="row">
                                    @foreach ($posts as $post)
                                        @if ($loop->index == 0)
                                            @continue;
                                        @endif
                                        @if ($loop->index > 2)
                                        @break;
                                    @endif
                                    <div class="col-12 mb-3">
                                        <div class="card h-100 border-0">
                                            <div class="row g-0 h-100">
                                                <div class="col-4">
                                                    <img src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                                        class="img-fluid h-100 w-100 rounded-3 shadow-sm"
                                                        alt="Small Post Image" style="object-fit: cover;"
                                                        onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                                </div>
                                                <div class="col-8">
                                                    <div class="card-body">
                                                        <span
                                                            class="badge bg-warning text-dark mb-2">{{ $post->categories->first()->name }}</span>
                                                        <h6 class="card-title"><a
                                                                href="{{ route('post.detail', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
                                                        </h6>
                                                        <p class="card-text"><small class="text-muted">
                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                    width="19" height="19"
                                                                    viewBox="0 0 24 28">
                                                                    <path
                                                                        d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                                    </path>
                                                                </svg>
                                                                {{ $post->created_at->diffForHumans() }}</small></p>
                                                        <a href="{{ route('user.detail', ['id' => $post->user->id]) }}"
                                                            class="d-inline-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="{{ asset('bet/logo.png') }}" alt=""
                                                                    width="20px">
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
                        @foreach ($posts as $post)
                            @if ($loop->index <= 2)
                                @continue;
                            @endif
                            @if ($loop->index > 5)
                            @break;
                        @endif
                        <div class="col-lg-4 mb-3">
                            <div class="card h-100 border-0">
                                <div class="row g-0 h-100">
                                    <div class="col-4">
                                        <img src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                            class="img-fluid h-100 w-100 rounded-3 shadow-sm"
                                            alt="Small Post Image" style="object-fit: cover;"
                                            onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <span
                                                class="badge bg-warning text-dark mb-2">{{ $post->categories->first()->name }}</span>
                                            <h6 class="card-title"><a
                                                    href="{{ route('post.detail', ['alias' => $post->slug]) }}">{{ $post->title }}</a>
                                            </h6>
                                            <p class="card-text"><small class="text-muted">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                        width="19" height="19" viewBox="0 0 24 28">
                                                        <path
                                                            d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                        </path>
                                                    </svg>
                                                    {{ $post->created_at->diffForHumans() }}</small></p>
                                            <a href="{{ route('user.detail', ['id' => $post->user->id]) }}"
                                                class="d-inline-flex align-items-center">
                                                <div class="me-2">
                                                    <img src="{{ asset('bet/logo.png') }}" alt=""
                                                        width="20px">
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
        <div
            class="col-xl-9 col-lg-9 col-md-7 col-sm-10 d-xl-flex d-lg-flex d-block align-items-center translate-middle-y">
            <div class="part-text">
                <h4 class="title">Promo Code</h4>
            </div>
        </div>
        <div
            class="col-xl-3 col-lg-3 col-md-5 d-xl-flex d-lg-flex d-md-flex d-block align-items-center translate-middle-y">
            <div class="part-btn">
                <a class="prd-btn-1" href="#/faq">Trợ Giúp <i class="fa-regular fa-circle-info"></i></a>
            </div>
        </div>
    </div>
    <div class="row aos-init" data-aos="fade-up" data-aos-delay="50">
        @foreach ($codes as $code)
            <div class="col-md-3">
                <div class="item-promo text-center">
                    <img src="{{ $code->booker->image }}" alt=""
                        onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                    <span>{{ $code->description ?? $code->booker->description }}</span>
                    <div class="code mt-4 justify-content-center">
                        {{ $code->name }}
                    </div>
                    <a href="{{ route('booker.detail', $code->booker->id) }}" class="prd-btn-1 d-flex mt-3">
                        <span class="ms-auto me-auto">XEM NGAY<i class="fa-duotone fa-arrow-right"></i></span>
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
        <h3 class="sub-title">TIPS</h3>
        <h2 class="title">Tips hôm nay</h2>
    </div>
    @if ($tips->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            <b>Hiện không có tips mới. Hãy ghé thăm sau!</b>
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
<style>
    .shape-img {

    }
    .booker_mini_avt {
        width: 50px;
        height: 50px;
        background-size: cover;
        background-position: center;
        border-radius: 100%;
    }
    .card-wrapper{
        display: flex !important;
        align-items: center;
        padding-top: 10%;
    }
    #cardContainer {
        z-index: 1;
        margin-left: 50px;
        padding-top: 0px !important;
        margin-left: 0px !important;
    }
    .banner-text{
        font-size: 3rem;
        width: 120%;
    }
    .banner-7::after {
        /* max-height: 90vh!important; */
        position: absolute;
        content: "";
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: url('https://peredion.netlify.app/assets/img/banner/banner-bg-4.jpg') center center no-repeat;
        background-size: cover;
        z-index: -1;
        opacity: 0.35;
        mix-blend-mode: luminosity;
    }
    @media (max-width: 1080) {
    }
    @media (max-width: 992px) {
        .banner-wrapper{
            justify-content: space-around;
        }
        .banner-text{
            width: 100%;
        }
        #cardContainer {
            padding-top: 0px !important;
            margin-left: 0px !important;
        }
        
        
    }
    
    @media (max-width: 760px) {
        #cardContainer {
            padding: 0;
        }

    }
    @media (max-width: 992px) {
        .banner-wrapper{
            justify-content: space-around;
        }
        .banner-text{
            width: 100%;
        }
        #cardContainer {
            padding-top: 0px !important;
            margin-left: 0px !important;
        }

        
    }

</style>
@endsection
