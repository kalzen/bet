<!-- preloader begin -->
<div class="preloader" style="display: none;">
    <div class="icon">
        <img src="{{ asset('bet/preload-1.gif') }}" alt="">
        <img src="{{ asset('bet/preload-2.gif') }}" alt="">
        <img src="{{ asset('bet/preload-5.gif') }}" alt="">
        <img src="{{ asset('bet/preload-4.gif') }}" alt="">
        <img src="{{ asset('bet/preload-3.gif') }}" alt="">
    </div>
    <span class="text">
        bettests is loading
    </span>
</div>
<!-- preloader end -->


<div class="header animated">
    <div class="top-bar topbar-transparent" style="background: #161D35!important;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-5 col-md-7">
                    <div class="left-side">
                        {{-- <div class="single-bar">
                            <a class="dashboard-overview" href="#/dashboard-overview.html">
                                <span class="part-icon">
                                    <i class="fa-regular fa-circle-user"></i>
                                </span>
                                <span class="part-text">hi, <span class="user-name">{{ $shared_config['address']['value'] }}</span></span>
                            </a>
                        </div> --}}
                        <div class="single-bar">
                            <a class="dashboard-overview" href="mailto:%20abc@example.com">
                                <span class="part-icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </span>
                                <span class="part-text">{{ $shared_config['email']['value'] ?? 'MAIL' }}</span>
                            </a>
                        </div>
                        <div class="single-bar dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false" class="dashboard-overview">
                                <span class="part-icon">
                                    <i class="fa-regular fa-globe"></i>
                                </span>
                                <span class="part-text lang-display">
                                    @if($langs->where('locale', App::getLocale())->first())
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
                                @if(!$langs->where('locale', App::getLocale())->first())
                                    <li><a class="dropdown-item" href="{{ route('change-language', ['locale' => 'en']) }}">English</a></li>
                                    <li><a class="dropdown-item" href="{{ route('change-language', ['locale' => 'vi']) }}">Tiếng Việt</a></li>
                                @endif
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
                            <span class="part-text"><span class="timer" id="hours">03</span>:<span class="timer"
                                    id="minutes">02</span>:<span class="timer" id="seconds">49</span></span>
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
                        <img src="{{ asset('bet/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-6 col-xl-none col-lg-none col-lg-block">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                    @foreach ($shared_nav_links->sortBy('ordering')->take(ceil(count($shared_nav_links) / 2)) as $nav_link)
                                        @php
                                            $lang_nav_link = $nav_link->getAvailableLang();
                                        @endphp
                                        @if (!$lang_nav_link)
                                            @continue
                                        @endif
                                        
                                        @if ($nav_link->children->count() > 0)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ strtoupper($lang_nav_link['name']) }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown" aria-labelledby="pagesDropdown">
                                                    {{-- @dd($nav_link->langChildren()); --}}
                                                    @foreach ($nav_link['children'] as $child)
                                                        @php
                                                            $lang_child = $child->getAvailableLang();
                                                        @endphp
                                                        @if (!$lang_child)
                                                            @continue
                                                        @endif
                                                        <li><a class="dropdown-item" href="{{ $lang_child['url'] }}">{{ $lang_child['name'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ $lang_nav_link['url'] }}">{{ strtoupper($lang_nav_link['name']) }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-2 col-lg-2 d-xl-block d-lg-block d-md-none">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('bet/logo.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5">
                                <ul class="navbar-nav nn-right">
                                    @foreach ($shared_nav_links->sortBy('ordering')->skip(ceil(count($shared_nav_links) / 2)) as $nav_link)
                                        @php
                                            $lang_nav_link = $nav_link->getAvailableLang();
                                        @endphp
                                        @if (!$lang_nav_link)
                                            @continue
                                        @endif
                                        @if ($nav_link->children->count() > 0)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ strtoupper($lang_nav_link['name']) }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown" aria-labelledby="pagesDropdown">
                                                    @foreach ($nav_link['children'] as $child)
                                                        @php
                                                            $lang_child = $child->getAvailableLang();
                                                        @endphp
                                                        @if (!$lang_child)
                                                            @continue
                                                        @endif
                                                        <li><a class="dropdown-item" href="{{ $lang_child['url'] }}">{{ $lang_child['name'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ $lang_nav_link['url'] }}">{{ strtoupper($lang_nav_link['name']) }}</a>
                                            </li>
                                        @endif
                                    @endforeach
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
