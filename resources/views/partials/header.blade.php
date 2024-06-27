<!-- preloader begin -->
<div class="preloader" style="display: none;">
            <div class="icon">
                <img src="{{asset('bet/preload-1.gif')}}" alt="">
                <img src="{{asset('bet/preload-2.gif')}}" alt="">
                <img src="{{asset('bet/preload-5.gif')}}" alt="">
                <img src="{{asset('bet/preload-4.gif')}}" alt="">
                <img src="{{asset('bet/preload-3.gif')}}" alt="">
            </div>
            <span class="text">
                peredion is loading
            </span>
        </div>
        <!-- preloader end -->

        
        <div class="header animated">
            <div class="top-bar topbar-transparent">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-5 col-lg-5 col-md-7">
                            <div class="left-side">
                                <div class="single-bar">
                                    <a class="dashboard-overview" href="#/dashboard-overview.html">
                                        <span class="part-icon">
                                            <i class="fa-regular fa-circle-user"></i>
                                        </span>
                                        <span class="part-text">hi, <span class="user-name">john doe</span></span>
                                    </a>
                                </div>
                                <div class="single-bar">
                                    <a class="dashboard-overview" href="mailto:%20abc@example.com">
                                        <span class="part-icon">
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        <span class="part-text">predion@mail.co</span>
                                    </a>
                                </div>
                                <div class="single-bar dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" class="dashboard-overview">
                                        <span class="part-icon">
                                            <i class="fa-regular fa-globe"></i>
                                        </span>
                                        <span class="part-text lang-display">eng</span>
                                    </a>
                                    <ul class="dropdown-menu lang-item" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">ENG</a></li>
                                        <li><a class="dropdown-item" href="#">বাংলা</a></li>
                                        <li><a class="dropdown-item" href="#">عربي</a></li>
                                        <li><a class="dropdown-item" href="#">हिन्दी</a></li>
                                        <li><a class="dropdown-item" href="#">Español</a></li>
                                        <li><a class="dropdown-item" href="#">贛語</a></li>
                                        <li><a class="dropdown-item" href="#">Հայերեն</a></li>
                                        <li><a class="dropdown-item" href="#">Ўзбек</a></li>
                                    </ul>
                                </div>
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
                                    <span class="part-text"><span class="timer" id="hours">03</span>:<span class="timer" id="minutes">02</span>:<span class="timer" id="seconds">49</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-xl-none col-lg-none col-md-block d-flex align-items-center">
                            <a class="mobile-logo" href="#/">
                                <img src="{{asset('bet/logo.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-xl-none col-lg-none col-lg-block">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa-light fa-bars"></i>
                            </button>
                            <button class="changing-version" data-bs-toggle="modal" data-bs-target="#comming_soon">
                                <i class="fa-solid fa-moon-stars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainmenu">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="scalation">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5">
                                        <ul class="navbar-nav nn-left">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle active" href="#" id="home-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Home
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown" aria-labelledby="home-dropdown">
                                                    <li><a class="dropdown-item active" href="#/">Homepage 01</a></li>
                                                    <li><a class="dropdown-item" href="#/index-2">Homepage 02</a></li>
                                                    <li><a class="dropdown-item" href="#/index-3">Homepage 03</a></li>
                                                    <li><a class="dropdown-item" href="#/index-4">Homepage 04</a></li>
                                                    <li><a class="dropdown-item" href="#/index-5">Homepage 05</a></li>
                                                    <li><a class="dropdown-item" href="#/index-6">Homepage 06</a></li>
                                                    <li><a class="dropdown-item" href="#/index-7">Homepage 07</a></li>
                                                    <li><a class="dropdown-item" href="#/index-8">Homepage 08</a></li>
                                                    <li><a class="dropdown-item" href="#/index-9">Homepage 09</a></li>
                                                    <li><a class="dropdown-item" href="#/index-10">Homepage 10</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#/about">about us</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="betDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    all bets
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="betDropdown">
                                                    <li><a class="dropdown-item" href="#/playing-bet">all bets</a></li>
                                                    <li><a class="dropdown-item" href="#/playing-bet-in-play">in-play</a></li>
                                                    <li><a class="dropdown-item" href="#/playing-bet-upcoming">upcoming</a></li>
                                                    <li><a class="dropdown-item" href="#/playing-bet-finished">finished</a></li>
                                                    <li><a class="dropdown-item" href="#/match-details">bet details</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#/contact">contact us</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-2 col-lg-2 d-xl-block d-lg-block d-md-none">
                                        <div class="logo">
                                            <a href="#/">
                                                <img src="{{asset('bet/logo.png')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5">
                                        <ul class="navbar-nav nn-right">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    pages
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown" aria-labelledby="pagesDropdown">
                                                    <li><a class="dropdown-item" href="#/blog-posts">blog post</a></li>
                                                    <li><a class="dropdown-item" href="#/blog-details">blog details</a></li>
                                                    <li><a class="dropdown-item" href="#/sign-in">login</a></li>
                                                    <li><a class="dropdown-item" href="#/register">register</a></li>
                                                    <li><a class="dropdown-item" href="#/error">error 404</a></li>
                                                    <li><a class="dropdown-item" href="#/affiliate">affiliate</a></li>
                                                    <li><a class="dropdown-item" href="#/promotion">promotion</a></li>
                                                    <li><a class="dropdown-item" href="#/promotion-details">promo details</a></li>
                                                    <li><a class="dropdown-item" href="#/ranking">ranking</a></li>
                                                    <li><a class="dropdown-item" href="#">bracket</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#/faq">faq</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    dashboard
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dashboardDropdown">
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/">overview <small>(index)</small></a></li>
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/dashboard-bet-history">bet history</a></li>
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/dashboard-transaction-history">transaction</a></li>
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/dashboard-deposit">deposit</a></li>
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/dashboard-withdraw">withdrawal</a></li>
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/dashboard-referral">referral</a></li>
                                                    <li><a class="dropdown-item" href="#/peredion-dashboard/dashboard-settings">settings</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item version-changing-button">
                                                <button class="nav-link" data-bs-toggle="modal" data-bs-target="#comming_soon">dark mode</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- header end -->

        <!-- banner begin -->
        <div class="banner-7">
            <div class="container">
                <div class="row justify-content-xxl-between justify-content-xl-between justify-content-lg-between justify-content-md-center">
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-8 d-xl-block d-lg-block d-md-flex d-block align-items-center">
                        <div class="banner-content">
                            <h1 class="title" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in">
                                place <span class="special">a bet </span><br/>
                                    on your fav. <br/>
                                    match<br/>
                            </h1>
                            <div class="all-btn" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease-in">
                                <a class='prd-btn-1' href='/playing-bet'>Bet NOW <i class="fa-duotone fa-arrow-right"></i></a>
                                <a class='prd-btn-3' href='/about'>EXPLORE <i class="fa-duotone fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-12">
                        <div class="part-img">
                            <img src="{{asset('bet/img-shape-7.png')}}" alt="" class="shape-img">
                            <div class="glitch activate glitch--style-1 img-1">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-1 banner-shape"></div>
            <div class="shape-2 banner-shape"></div>
        </div>
        <!-- banner end -->

        <!-- scroll down button begin -->
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
        <!-- scroll down button end -->