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
<style>
    .changing-version+.dropdown-menu {
        min-width: 200px;
        margin-top: 0.5rem;
        background: #161D35;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .changing-version+.dropdown-menu .dropdown-item {
        color: #fff;
    }

    .changing-version+.dropdown-menu .dropdown-item:hover,
    .changing-version+.dropdown-menu .dropdown-item.active {
        background: rgba(255, 255, 255, 0.1);
    }

    .navbar-nav .changing-version {
        background: transparent;
        border: none;
        padding: 0.5rem 1rem;
    }

    .navbar-nav .changing-version:hover {
        color: var(--primary-color);
    }

    .language-flag {
        width: 20px;
        height: 15px;
        object-fit: cover;
        border-radius: 2px;
    }

    .changing-version svg {
        width: 20px;
        height: 15px;
        border-radius: 2px;
    }

    /* Nếu muốn thêm hiệu ứng hover */
    .changing-version:hover svg {
        filter: brightness(1.2);
    }

    .dropdown-item .flag-icon svg {
        width: 20px;
        height: 15px;
        border-radius: 2px;
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
    }

    /* Nếu muốn thêm hiệu ứng hover cho flag trong dropdown */
    .dropdown-item:hover .flag-icon svg {
        filter: brightness(1.2);
    }

    .header .mainmenu .navbar .scalation .logo img {
        margin-top: 30px;
    }
</style>

<div class="header animated">
    {{-- <div class="top-bar topbar-transparent" style="background: #161D35!important;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-5 col-md-7">
                    <div class="left-side">
                        <div class="single-bar">
                            <a class="dashboard-overview" href="mailto:%20{{ $shared_config['email']['value'] ?? 'null' }}">
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
    </div> --}}
    <div class="mobile-navbar">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xl-none col-lg-none col-md-block d-flex align-items-center">
                    @if(Session::get('locale') == config('app.locale'))
                        <a class="mobile-logo" href="{{ route('default.home') }}">
                    @else
                        <a class="mobile-logo" href="{{ '/' . Session::get('locale') }}">
                    @endif
                        <img src="{{ $shared_config['logo']['value'] }}" alt="">
                    </a>
                </div>
                <div class="col-6 col-xl-none col-lg-none col-lg-block">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="dropdown d-inline-block me-2">
                            <button class="changing-version" type="button" id="languageSelector"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {!! \App\Helpers\LanguageHelper::getCountryFlag(App::getLocale()) !!}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageSelector">
                                @foreach ($langs as $lang)
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center {{ App::getLocale() == $lang->locale ? 'active' : '' }}"
                                            href="{{ route('change-language', ['locale' => $lang->locale]) }}">
                                            <span class="flag-icon me-2">
                                                {!! \App\Helpers\LanguageHelper::getCountryFlag($lang->locale) !!}
                                            </span>
                                            {{ $lang->name }}
                                        </a>
                                    </li>
                                @endforeach
                                @if (!$langs->where('locale', App::getLocale())->first())
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('change-language', ['locale' => 'en']) }}">
                                            <span class="flag-icon me-2">
                                                {!! \App\Helpers\LanguageHelper::getCountryFlag('en') !!}
                                            </span>
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('change-language', ['locale' => 'vi']) }}">
                                            <span class="flag-icon me-2">
                                                {!! \App\Helpers\LanguageHelper::getCountryFlag('vi') !!}
                                            </span>
                                            Tiếng Việt
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa-light fa-bars"></i>
                        </button>
                    </div>
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
                                                <a class="nav-link dropdown-toggle" href="{{ $nav_link['url'] }}"
                                                    id="pagesDropdown" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    {{ strtoupper($lang_nav_link['name']) }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown"
                                                    aria-labelledby="pagesDropdown">
                                                    {{-- @dd($nav_link->langChildren()); --}}
                                                    @foreach ($nav_link['children'] as $child)
                                                        @php
                                                            $lang_child = $child->getAvailableLang();
                                                        @endphp
                                                        @if (!$lang_child)
                                                            @continue
                                                        @endif
                                                        <li><a class="dropdown-item"
                                                                href="{{ $child['url'] }}">{{ $lang_child['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ $nav_link['url'] }}">{{ strtoupper($lang_nav_link['name']) }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-2 col-lg-2 d-xl-block d-lg-block d-md-none">
                                <div class="logo">
                                    @if(Session::get('locale') == config('app.locale'))
                                        <a href="{{ route('default.home') }}">
                                    @else
                                        <a href="{{ '/' . Session::get('locale') }}">
                                    @endif
                                        <img src="{{ $shared_config['logo']['value'] }}" alt="">
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
                                                <a class="nav-link dropdown-toggle" href="{{ $nav_link['url'] }}"
                                                    id="pagesDropdown" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    {{ strtoupper($lang_nav_link['name']) }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown"
                                                    aria-labelledby="pagesDropdown">
                                                    @foreach ($nav_link['children'] as $child)
                                                        @php
                                                            $lang_child = $child->getAvailableLang();
                                                        @endphp
                                                        @if (!$lang_child)
                                                            @continue
                                                        @endif
                                                        <li><a class="dropdown-item"
                                                                href="{{ $child['url'] }}">{{ $lang_child['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ $nav_link['url'] }}">{{ strtoupper($lang_nav_link['name']) }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    <li class="nav-item dropdown">
                                        <button class="changing-version nav-link" type="button"
                                            id="desktopLanguageSelector" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {!! \App\Helpers\LanguageHelper::getCountryFlag(App::getLocale()) !!}
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="desktopLanguageSelector">
                                            @foreach ($langs as $lang)
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center {{ App::getLocale() == $lang->locale ? 'active' : '' }}"
                                                        href="{{ route('change-language', ['locale' => $lang->locale]) }}">
                                                        <span class="flag-icon me-2">
                                                            {!! \App\Helpers\LanguageHelper::getCountryFlag($lang->locale) !!}
                                                        </span>
                                                        {{ $lang->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                            @if (!$langs->where('locale', App::getLocale())->first())
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('change-language', ['locale' => 'en']) }}">
                                                        <span class="flag-icon me-2">
                                                            {!! \App\Helpers\LanguageHelper::getCountryFlag('en') !!}
                                                        </span>
                                                        English
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('change-language', ['locale' => 'vi']) }}">
                                                        <span class="flag-icon me-2">
                                                            {!! \App\Helpers\LanguageHelper::getCountryFlag('vi') !!}
                                                        </span>
                                                        Tiếng Việt
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
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
