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
                                <span class="part-text lang-display">Tiếng Việt</span>
                            </a>
                            <ul class="dropdown-menu lang-item" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Tiếng Việt</a></li>
                                <li><a class="dropdown-item" href="#">English</a></li>
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
                                    @php
                                        $nav_links = $shared_nav_links->sortBy('ordering');
                                        $seen_orderings = [];
                                        $nav_links = $nav_links->map(function ($nav_link) use (&$seen_orderings) {
                                            $original_ordering = $nav_link->ordering;
                                            while (in_array($nav_link->ordering, $seen_orderings)) {
                                                $nav_link->ordering++;
                                            }
                                            $seen_orderings[] = $nav_link->ordering;
                                            return $nav_link;
                                        });
                                        $nav_chunks = $nav_links->chunk(ceil($nav_links->count() / 2));
                                        $nav_chunks = array_pad($nav_chunks->toArray(), 2, []);
                                    @endphp
                                    @foreach ($nav_chunks[0] as $nav_link)
                                        @if ($nav_link['children'] != null)
                                            {{-- @dd($nav_link['children']); --}}
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ strtoupper($nav_link['name']) }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown"
                                                    aria-labelledby="pagesDropdown">
                                                    @foreach ($nav_link['children'] as $child)
                                                        <li><a class="dropdown-item"
                                                                href="{{ $child['url'] }}">{{ $child['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @elseif ($nav_link['parent_id'] == null)
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ $nav_link['url'] }}">{{ strtoupper($nav_link['name']) }}</a>
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
                                    @foreach ($nav_chunks[1] as $nav_link)
                                        @if ($nav_link['children'] != null)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ strtoupper($nav_link['name']) }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown"
                                                    aria-labelledby="pagesDropdown">
                                                    @foreach ($nav_link['children'] as $child)
                                                        <li><a class="dropdown-item"
                                                                href="{{ $child['url'] }}">{{ $child['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @elseif ($nav_link['parent_id'] == null)
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ $nav_link['url'] }}">{{ strtoupper($nav_link['name']) }}</a>
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
