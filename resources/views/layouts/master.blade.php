<!DOCTYPE html>
<html lang="vn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bettest</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="#/favicon.ico" type="image/x-icon">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('bet/bootstrap.min.css')}}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{asset('bet/animate.css')}}">
        <link rel="stylesheet" href="{{asset('bet/animate.min.css')}}">
        <!-- load all Font Awesome styles -->
        <link rel="stylesheet" href="{{asset('bet/all.min.css')}}">
        <!-- owl carousel css -->
        <link rel="stylesheet" href="{{asset('bet/owl.carousel.min.css')}}">
        <!-- odometer css -->
        <link rel="stylesheet" href="{{asset('bet/odometer.min.css')}}">
        <!-- overlay scrollbar css -->
        <link rel="stylesheet" href="{{asset('bet/OverlayScrollbars.min.css')}}">
        <!-- aos css -->
        <link href="{{asset('bet/aos.css')}}" rel="stylesheet">
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('bet/style.css')}}">
        <link rel="stylesheet" href="{{asset('bet/custom.css')}}">
    </head>
    <body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" style=""><div class="flying-shadow hide"><i class="fa-duotone fa-paper-plane"></i></div>
    @include('partials.header')
    
        
        @yield('content')

        <!-- footer begin -->
        <div class="footer">
            <div class="global-shape style-4">
                <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500" data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="500" class="aos-init">
            </div>
            <div class="footer-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-9">
                            <div class="part-about">
                                <div class="footer-logo aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-easing="ease-in">
                                    <a href="#/">
                                        <img src="{{asset('bet/logo.png')}}" alt="" class="logo">
                                    </a>
                                </div>
                                {{-- <p data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init">This allows bettors to bet over or under the bookmaker's score,<br> and indicate what they believe the difference in points will be.</p> --}}
                                <ul class="importants-links">
                                    <li class="single-link aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in">
                                        <a href="#0">Chính sách</a>
                                    </li>
                                    <li class="single-link aos-init" data-aos="fade-up" data-aos-delay="250" data-aos-duration="500" data-aos-easing="ease-in">
                                        <a href="#0">Điều kiện</a>
                                    </li>
                                    <li class="single-link aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease-in">
                                        <a href="#0">Giấy phép</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom"><div class="back-to-top-btn"><a href="#"><i class="fa-solid fa-arrow-turn-up"></i></a></div>
                <div class="container">
                    <div class="footer-bottom-content">
                        <p class="copyright-text">Copyright © 2024. All Right Reserved By Kalzen Media</p>
                        <ul class="social-link">
                            <li class="single-social">
                                <a href="#0">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="single-social">
                                <a href="#0">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li class="single-social">
                                <a href="#0">
                                    <i class="fa-brands fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="footer-menu">
                            <ul>
                                @foreach ($shared_nav_links->sortBy('ordering') as $nav)
                                    <li>
                                        <a class="single-menu" href="#/">{{ $nav->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
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
        <script src="{{asset('bet/jquery-3.6.0.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('bet/bootstrap.bundle.min.js')}}"></script>
        <!-- owl carousel js -->
        <script src="{{asset('bet/owl.carousel.min.js')}}"></script>
        <!-- live clock js -->
        <script src="{{asset('bet/clock.min.js')}}"></script>
        <!-- appear js -->
        <script src="{{asset('bet/jquery.appear.min.js')}}"></script>
        <!-- odometer js -->
        <script src="{{asset('bet/odometer.min.js')}}"></script>
        <!-- overlayScrollbars js -->
        <script src="{{asset('bet/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- aos js -->
        <script src="{{asset('bet/aos.js')}}"></script>
        <!-- main script js -->
        <script src="{{asset('bet/main.js')}}"></script>
        <!-- placing bet js -->
        <script src="{{asset('bet/placing-bet.js')}}"></script>
    

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <img src="{{asset('bet/icon-1(2).png')}}" alt="">
                                    </div>
                                    <span class="team-name">Dinamo Zagreb</span>
                                </div>
                                <img src="{{asset('bet/modal-vs.png')}}" alt="" class="versace-icon">
                                <div class="single-team">
                                    <span class="team-name">Bodo Glimt FC</span>
                                    <div class="team-icon">
                                        <img src="{{asset('bet/icon-5.png')}}" alt="">
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
                            <button class="prd-btn-1 medium" data-bs-dismiss="modal" id="keepInSlip">keep it in betslip <i class="fa-duotone fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </body></html>