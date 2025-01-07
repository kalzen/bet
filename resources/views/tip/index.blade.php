@extends('layouts.master')
@section('content')
    <div class="prd-breadcrumb">
        <div class="container">
            <div class="brd-content">
                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in"
                    class="aos-init aos-animate">
                    <span class="sub-title">{{ __('tip.list.tips') }}</span>
                </div>
                <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                    data-aos-easing="ease-in">{{ __('tip.list.today_tips') }}</h2>
                <div class="page-direction">
                    <ul>
                        <li>
                            <span class="icon"><i class="fa-solid fa-house"></i></span>
                            <span class="text">{{ __('tip.list.home') }}</span>
                        </li>
                        <li>
                            <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                            <span class="text">{{ __('tip.list.tips') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="inner-section blog-standard">
        <div class="container-fluid">
            <div class="row">
            </div>
        </div>
        <div class="sports-schedule">
            <div class="global-shape style-4">
                <img src="{{ asset('bet/shape-1.png') }}" alt="" data-aos="fade-left" data-aos-duration="1500"
                    data-aos-delay="500" class="aos-init">
            </div>
            <div class="container">
                {{-- <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <h3 class="sub-title">{{ __('tip.list.tips') }}</h3>
                    <h2 class="title">{{ __('tip.list.today_tips') }}</h2>
                </div> --}}
                @if ($tips->isEmpty())
                    <div class="my-3 alert alert-info text-center" role="alert">
                        <b>{{ __('tip.list.no_tips') }}</b>
                    </div>
                @endif
                @foreach ($tips as $tip)
                    @if ($tip->getAvailableLang())
                        @php
                            $langTip = $tip->getAvailableLang();
                        @endphp
                        @if (!$langTip)
                            @continue
                        @endif
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
                                        <img src="{{ $shared_config['logo']['value'] }}" alt="Team 1" class="me-2"
                                            width="30" height="30">
                                        <span class="w-75">{{ $tip->name_team_1 }}</span>
                                        <span>{{ $tip->score_team_1 }}</span>
                                    </div>
                                    <div class="d-flex justify-content-around align-items-center mt-2">
                                        <img src="{{ $shared_config['logo']['value'] }}" alt="Team 2" class="me-2"
                                            width="30" height="30">
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
                                        <span class="text-muted d-block d-md-none">{{ __('tip.list.prediction') }}</span>
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
                                            class="ms-auto me-auto">{{ __('tip.list.bet') }}</span> </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

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
