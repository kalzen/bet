<!DOCTYPE html>
<html lang="vn">
@php
    $currentLocale = App::getLocale();
    $appUrl = env('APP_URL');
    // dd($appUrl);
@endphp
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bettest</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ $shared_config['logo']['value'] }}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('bet/bootstrap.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('bet/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('bet/animate.min.css') }}">
    <!-- load all Font Awesome styles -->
    <link rel="stylesheet" href="{{ asset('bet/all.min.css') }}">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="{{ asset('bet/owl.carousel.min.css') }}">
    <!-- odometer css -->
    <link rel="stylesheet" href="{{ asset('bet/odometer.min.css') }}">
    <!-- overlay scrollbar css -->
    <link rel="stylesheet" href="{{ asset('bet/OverlayScrollbars.min.css') }}">
    <!-- aos css -->
    <link href="{{ asset('bet/aos.css') }}" rel="stylesheet">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('bet/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bet/custom.css') }}">
    <style>
        @media (max-width: 991.98px) {
            .inner-section .blog-standard {
                transform: translateY(-4vh);
            }
        }
    </style>
</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" style="">
    <div class="flying-shadow hide"><i class="fa-duotone fa-paper-plane"></i></div>
    @include('partials.header')

    @yield('content')
    @if(isset($assignedContent) && $assignedContent->content)
        <div class="custom-content px-3">
            {!! $assignedContent->content !!}
        </div>
    @endif

    <!-- footer begin -->
    <div class="footer">
        <div class="global-shape style-4">
            <img src="{{ asset('bet/shape-1.png') }}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="500" class="aos-init">
        </div>
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-9">
                        <div class="part-about">
                            <div class="footer-logo aos-init" data-aos="fade-up" data-aos-delay="100"
                                data-aos-duration="500" data-aos-easing="ease-in">
                                @if (Session::get('locale') == 'en')
                                    <a href="/">
                                        <img src="{{ $shared_config['logo']['value'] }}" alt="" class="logo">
                                    </a>
                                @else
                                    <a href="{{ $appUrl. '/' . ($currentLocale == 'en' ? '' : $currentLocale . '/') }}">
                                        <img src="{{ $shared_config['logo']['value'] }}" alt="" class="logo">
                                    </a>
                                @endif
                            </div>
                            {{-- <p data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init">This allows bettors to bet over or under the bookmaker's score,<br> and indicate what they believe the difference in points will be.</p> --}}
                            <ul class="importants-links">
                                <li class="single-link aos-init" data-aos="fade-up" data-aos-delay="200"
                                    data-aos-duration="500" data-aos-easing="ease-in">
                                    <a href="#0">{{ __('layout.policy') }}</a>
                                </li>
                                <li class="single-link aos-init" data-aos="fade-up" data-aos-delay="250"
                                    data-aos-duration="500" data-aos-easing="ease-in">
                                    <a href="#0">{{ __('layout.terms') }}</a>
                                </li>
                                <li class="single-link aos-init" data-aos="fade-up" data-aos-delay="300"
                                    data-aos-duration="500" data-aos-easing="ease-in">
                                    <a href="#0">{{ __('layout.license') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="back-to-top-btn"><a href="#"><i class="fa-solid fa-arrow-turn-up"></i></a></div>
            <div class="container">
                <div class="footer-bottom-content">
                    <p class="copyright-text">{{ __('layout.copyright') }}</p>
                    <ul class="social-link">
                        <li class="single-social">
                            <a href="{{ $shared_config['facebook']['value'] }}">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        {{-- <li class="single-social">
                                <a href="#0">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li class="single-social">
                                <a href="#0">
                                    <i class="fa-brands fa-pinterest-p"></i>
                                </a>
                            </li> --}}
                    </ul>
                    <div class="footer-menu">
                        <ul>
                            @foreach ($shared_nav_links->sortBy('ordering') as $nav)
                                @if ($nav->getAvailableLang())
                                    @php
                                        $nav = $nav->getAvailableLang();
                                    @endphp
                                    <li>
                                        <a class="single-menu" href="{{ $nav->url }}">{{ $nav->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="top-bar topbar-transparent" style="background: #161D35!important;">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-5 col-lg-5 col-md-7">
                            <div class="left-side">
                                <div class="single-bar">
                                    <a class="dashboard-overview"
                                        href="mailto:%20{{ $shared_config['email']['value'] ?? 'null' }}">
                                        <span class="part-icon">
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        <span
                                            class="part-text">{{ $shared_config['email']['value'] ?? 'MAIL' }}</span>
                                    </a>
                                </div>
                                {{-- <div class="single-bar dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false" class="dashboard-overview">
                                            <span class="part-icon">
                                                <i class="fa-regular fa-globe"></i>
                                            </span>
                                            <span class="part-text lang-display">
                                                @if ($langs->where('locale', App::getLocale())->first())
                                                    {{ $langs->where('locale', App::getLocale())->first()->name }}
                                                @else
                                                    {{ $langs->where('locale', 'en')->first()->name ?? Session::get('locale') }}
                                                @endif
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu lang-item" aria-labelledby="dropdownMenuLink">
                                            @foreach ($langs as $lang)
                                                <li><a class="dropdown-item" href="{{ route('change-language', ['locale' => $lang->locale]) }}">{{ $lang->name }}</a></li>
                                            @endforeach
                                            @if (!$langs->where('locale', App::getLocale())->first())
                                                <li><a class="dropdown-item" href="{{ route('change-language', ['locale' => 'en']) }}">English</a></li>
                                                <li><a class="dropdown-item" href="{{ route('change-language', ['locale' => 'vi']) }}">Tiếng Việt</a></li>
                                            @endif
                                        </ul>
                                    </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5">
                            <div class="right-side">
                                <div class="single-bar">
                                    <span class="part-icon">
                                        <i class="fa-regular fa-calendars"></i>
                                    </span>
                                    <span class="part-text">
                                        <span id="date">8</span>
                                        <span id="month">June</span>
                                        <span id="year">2024</span>
                                    </span>
                                </div>
                                <div class="single-bar">
                                    <span class="part-icon">
                                        <i class="fa-solid fa-timer"></i>
                                    </span>
                                    <span class="part-text"><span class="timer" id="hours">03</span>:<span
                                            class="timer" id="minutes">02</span>:<span class="timer"
                                            id="seconds">49</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->

    <!-- back to button begin -->
    <div class="back-to-top-btn">
        <a href="#">
            <i class="fa-light fa-turn-up"></i>
        </a>
    </div>
    <!-- back to top button end -->

    <!-- jQuery js -->
    <script src="{{ asset('bet/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('bet/bootstrap.bundle.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('bet/owl.carousel.min.js') }}"></script>
    <!-- live clock js -->
    <script src="{{ asset('bet/clock.min.js') }}"></script>
    <!-- appear js -->
    <script src="{{ asset('bet/jquery.appear.min.js') }}"></script>
    <!-- odometer js -->
    <script src="{{ asset('bet/odometer.min.js') }}"></script>
    <!-- overlayScrollbars js -->
    <script src="{{ asset('bet/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- aos js -->
    <script src="{{ asset('bet/aos.js') }}"></script>
    <!-- main script js -->
    <script src="{{ asset('bet/main.js') }}"></script>
    <!-- placing bet js -->
    <script src="{{ asset('bet/placing-bet.js') }}"></script>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="placing-bet-modal">
                <div class="pb-modal-header">
                    <span class="modal-title">Place your bet</span>
                    <button class="prd-close-btn" data-bs-dismiss="modal"><i class="fa-light fa-xmark"></i></button>
                </div>
                <div class="pb-modal-body">
                    <div class="selected-team">
                        <span class="slct-team-name">Dinamo Zagreb</span>
                        <span class="slct-bet-ratio"></span>
                    </div>
                    <div class="selected-match">
                        <div class="single-team">
                            <div class="team-icon">
                                <img src="{{ asset('bet/icon-1(2).png') }}" alt="">
                            </div>
                            <span class="team-name">Dinamo Zagreb</span>
                        </div>
                        <img src="{{ asset('bet/modal-vs.png') }}" alt="" class="versace-icon">
                        <div class="single-team">
                            <span class="team-name">Bodo Glimt FC</span>
                            <div class="team-icon">
                                <img src="{{ asset('bet/icon-5.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="scrores-line">
                        [ <span class="team-a-scr">0</span> : <span class="team-b-scr">0</span> ] 1X2 LIVE PREDICTION
                    </div>
                </div>
                <div class="pb-ctrl-stake">
                    <div class="prd-btn-group">
                        <button class="minus ctrl-btn"><i class="fa-solid fa-minus"></i></button>
                        <span class="stake-digit">1</span>
                        <button class="add ctrl-btn"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div class="pb-calc">
                    <span class="stake-line">Stake : <span class="stk-num"></span></span>
                    <span class="total-return">Total Est. Returns : <span class="ret-num">1.00</span></span>
                </div>
                <div class="pb-modal-footer">
                    <button class="prd-btn-1 medium" data-bs-dismiss="modal" id="keepInSlip">keep it in betslip <i
                            class="fa-duotone fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
