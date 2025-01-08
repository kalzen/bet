@extends('layouts.master')
@section('content')
<style>
    .section-title h1.title {
  -webkit-text-fill-color: transparent;
  -webkit-background-clip: text;
  background-image: linear-gradient(144.14deg, #4D233F -11.44%, #305B9F 123.42%);
  font-weight: 700;
  font-size: 50px;
  line-height: 60px;
  letter-spacing: 0.03em;
  position: relative;
  padding-bottom: 45px;
  margin-bottom: 0;
}
.section-title h1.title:after {
  content: "";
  height: 27px;
  width: 153px;
  background: url("../img/icon/section-title.png") left center no-repeat;
  background-size: contain;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}
@media (max-width: 1399.98px) {
  .section-title h1.title:after {
    height: 24px;
    width: 133px;
  }
}
@media (max-width: 991.98px) {
  .section-title h1.title:after {
    height: 21px;
    width: 120px;
  }
}
@media (max-width: 1399.98px) {
  .section-title h1.title {
    font-size: 45px;
    line-height: 55px;
    padding-bottom: 41px;
  }
}
@media (max-width: 1199.98px) {
  .section-title h1.title {
    font-size: 40px;
    line-height: 50px;
    padding-bottom: 37px;
  }
}
@media (max-width: 991.98px) {
  .section-title h1.title {
    font-size: 36px;
    line-height: 46px;
    padding-bottom: 36px;
  }
}
@media (max-width: 767.98px) {
  .section-title h1.title {
    font-size: 34px;
    line-height: 44px;
  }
}
@media (max-width: 575.98px) {
  .section-title h1.title {
    font-size: 30px;
    line-height: 40px;
    padding-bottom: 32px;
  }
}
@media (max-width: 479.98px) {
  .section-title h1.title {
    font-size: 28px;
    line-height: 38px;
  }
}
.prd-breadcrumb{
    transform: translateY(-4rem);
}
</style>
    <section class="inner-section blog-standard">

        <div class="prd-breadcrumb">
            <div class="container">
                <div class="brd-content">
                    <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in"
                        class="aos-init aos-animate">
                        {{-- <span class="sub-title">{{ __('booker.list.bookmaker') }}</span> --}}
                    </div>
                    {{-- <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                        data-aos-easing="ease-in">{{ __('booker.list.popular_page') }}</h2> --}}
                    <div class="page-direction">
                        <ul>
                            <li>
                                <span class="icon"><i class="fa-solid fa-house"></i></span>
                                <span class="text">{{ __('booker.list.home') }}</span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                                <span class="text">{{ __('booker.list.bookmaker') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- Left column for categories -->
                {{-- <div class="col-md-3 bg-light p-3">
                    <h4 class="ms-1">Hạng mục</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/booker">Tất cả</a></li>
                        @foreach ($categories as $category)
                            <li class="list-group-item"><a href="{{ route('booker.detail', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}

                <!-- Right column for bookers -->
                <div class="col-md-12">
                    {{-- <h1>{{isset($currentCategory->name)?'Danh sách nhà cái "'.$currentCategory->name.'"':'Danh sách nhà cái'}}</h1> --}}

                    {{-- <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{'Danh sách nhà cái'}}</li>
                    </ol> --}}
                    <div class="main-content">
                        <div class="row top-hot-bookers">
                            <div class="col">
                                @if ($hot_bookers->count() > 0)
                                    {{-- <div class="section-title aos-init mb-1" data-aos="fade-up" data-aos-delay="1"
                                        data-aos-duration="500" data-aos-easing="ease-in">
                                        <h3 class="sub-title pt-2">{{ __('booker.list.hot') }}</h3>
                                        <h2 class="title">{{ __('booker.list.popular_page') }}</h2>
                                    </div> --}}

                                    @include('booker.hot-booker-slider')
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="row all-bookers">
                        <div class="col">
                            @php
                                $empty = true;
                                foreach ($bookers as $booker) {
                                    if ($booker->getAvailableLang()) {
                                        $empty = false;
                                        break;
                                    }
                                }
                            @endphp
                            @if (!$empty)
                                <div class="mt-3 section-title aos-init" data-aos="fade-up" data-aos-delay="1"
                                    data-aos-duration="500" data-aos-easing="ease-in">
                                    {{-- <h3 class="sub-title pt-2">{{ __('booker.list.bookmaker') }}</h3> --}}
                                    <h1 class="title">{{ $currentCategoryName ?? __('home.top_bookmakers') }}</h1>
                                </div>
                            @else
                                <div class="my-3 alert alert-info text-center" role="alert">
                                    <b>{{ __('booker.list.no_bookmakers') }}</b>
                                </div>
                            @endif

                            <div class="list-group">
                                @foreach ($bookers as $booker)
                                    @if ($booker->getAvailableLang())
                                        @php
                                            $lang_booker = $booker->getAvailableLang();
                                        @endphp
                                        <div class="container mb-4">
                                            <!-- Promo Card -->
                                            <div class="card p-3 border-0 shadow-lg" style="border-radius: 20px">
                                                <div class="row align-items-center">
                                                    <div class="col-5 col-md-2 text-center">
                                                        <img src="{{ $lang_booker->image }}" alt="Dafabet Logo"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="col-7 col-md-7">
                                                        @foreach ($booker->categories as $category)
                                                            <span class="badge bg-success">{{ $category->getAvailableLang()?->name }}</span>
                                                        @endforeach
                                                        <h5 class="card-title">{{ $lang_booker->name }}</h5>
                                                        <p class="mt-2 mb-1">
                                                            <strong>{{ Str::limit($lang_booker->description, 130, '...') }}</strong>
                                                        </p>
                                                    </div>

                                                    {{-- <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="me-3">
                                                            <p class="mb-0"><strong>Expert Rating</strong></p>
                                                        <p class="mb-0 text-primary">5.0 / 5</p>
                                                        </div>
                                                        <div>
                                                            <p class="mb-0"><strong>User Rating</strong></p>
                                                        <p class="mb-0 text-primary">4.5 / 5</p>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                    <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                                        {{-- <p><strong>Payout Speed</strong></p> --}}
                                                        {{-- <p>Up to 3 days</p> --}}
                                                        <div class="border rounded-3 p-2">
                                                            <span>{{ __('booker.list.code') }}:</span>
                                                            <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : __('booker.list.no') }}</strong>
                                                        </div>
                                                        @if (Session::get('locale') == 'en')
                                                            <a href="{{ route('booker.detail.no-lang', ['alias' => $lang_booker->id]) }}" class="prd-btn-1 d-flex mt-1">
                                                                <span class="ms-auto me-auto" style="white-space: nowrap;">
                                                                    {{ __('booker.list.detail') }} <i class="fa-duotone fa-arrow-right"></i>
                                                                </span>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('booker.detail', ['locale_code' => $shared_locale, 'alias' => $lang_booker->id]) }}" class="prd-btn-1 d-flex mt-1">
                                                                <span class="ms-auto me-auto" style="white-space: nowrap;">
                                                                    {{ __('booker.list.detail') }} <i class="fa-duotone fa-arrow-right"></i>
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </div>

                                                    <div class="col-12 text-center mt-3">
                                                        {{-- <a href="#" class="btn btn-primary w-100 mb-2">Visit Site</a> --}}
                                                        {{-- <button class="btn btn-outline-secondary w-100">Show Details</button> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="col-sm-10 col-md-7 col-lg-4">
                <div class="blog-widget">
                    <h3 class="blog-widget-title"></h3>
                    <ul class="blog-widget-feed">
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
