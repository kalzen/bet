@extends('layouts.master')
@section('content')
    <section class="inner-section blog-standard">
        <style>
            .scrolling-wrapper {
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
                scroll-behavior: smooth;
            }
            .card-scroll {
                display: inline-block;
            }
            .scrolling-wrapper::-webkit-scrollbar {
                display: block;
            }
            .scrolling-wrapper {
                -ms-overflow-style: auto;
                scrollbar-width: auto;
            }
            .top-hot-bookers {
                flex-grow: 1;
                min-height: 200px;
                margin-bottom: 1rem;
            }

            .all-bookers {
                flex-grow: 2;
                min-height: 400px;
                overflow-y: auto;
            }

            .main-content {
                display: flex;
                flex-direction: column;
            }

            @media (max-width: 768px) {
                .top-hot-bookers {
                    height: auto;
                }
                .all-bookers {
                    height: auto;
                }
                .main-content {
                    height: auto;
                }
            }
            
        </style>
        <div class="prd-breadcrumb">
            <div class="container">
                <div class="brd-content">
                    {{-- <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init aos-animate">
                        <span class="sub-title">blog details</span>
                    </div>    
                    <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">Even more and setted see small seven to think...</h2> --}}
                    <div class="page-direction">
                        <ul>
                            <li>
                                <span class="icon"><i class="fa-solid fa-house"></i></span>
                                <span class="text">Home</span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                                <span class="text">Bookmakers</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
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
                <div class="col-md-12 mt-3">
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
                            <div class="section-title aos-init mb-1" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <h3 class="sub-title pt-2">HOT</h3>
                            <h2 class="title">Trang Nổi Bật</h2>
                        </div>
                            @endif
                            <div class="scrolling-wrapper" id="hotBookersScroll">
                                <div class="row">
                @foreach ($hot_bookers as $booker)
                    <div class="col container col-md-4 col-12 pt-3">
                        <div class="card shadow-lg p-3 mb-4 border-0" style="position: relative; border-radius: 20px;">
                            <!-- Circle number -->
                            <div class="position-absolute top-30 start-30  bg-danger rounded-circle"
                                style="width: 60px; height: 60px; line-height: 60px; text-align: center; color: white; font-weight: bold; font-size: 30px">
                                {{ $loop->iteration }}
                            </div>

                            <!-- Image section -->
                            <div class="text-center mb-3">
                                <img src="{{ $booker->image }}" alt="Logo" class="img-fluid rounded-3"
                                    onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                            </div>

                            <!-- Title section -->
                            <div class="text-center mb-3">
                                <h5 class="fw-bold">{{ $booker->name }}</h5>
                                <small class="text-muted mb-0">{{ $booker->description }}</small>
                            </div>
                            <div class="border rounded-3 p-2 d-flex justify-content-center align-items-center">
                                <span class="me-2">Code:</span>
                                <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : 'Không' }}</strong>
                            </div>
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
                        </div>
                    </div>
                    </div>
    
                    <div class="row all-bookers">
                        <div class="col">
                            @if ($bookers->count() > 0)
                            <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                            data-aos-easing="ease-in">
                            <h3 class="sub-title pt-2">BOOKMAKERS</h3>
                            <h2 class="title">Tham khảo thêm</h2>
                        </div>
                            @endif
                            <div class="list-group">
                                @foreach($bookers as $booker)
                                <div class="container mb-4">
                                    <!-- Promo Card -->
                                    <div class="card p-3 border-0 shadow-lg" style="border-radius: 20px">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2 text-center">
                                                <img src="{{ $booker->image }}" alt="Dafabet Logo" class="img-fluid">
                                            </div>
                                            <div class="col-9 col-md-4">
                                            @foreach ($booker->categories as $category)
                                                <span class="badge bg-success">{{ $category->name }}</span>
                                            @endforeach
                                            <h5 class="card-title">{{ $booker->name }}</h5>
                                                <p class="mt-2 mb-1"><strong>{{ $booker->description }}</strong></p>
                                            </div>
                                
                                            <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="me-3">
                                                        {{-- <p class="mb-0"><strong>Expert Rating</strong></p>
                                                        <p class="mb-0 text-primary">5.0 / 5</p> --}}
                                                    </div>
                                                    <div>
                                                        {{-- <p class="mb-0"><strong>User Rating</strong></p>
                                                        <p class="mb-0 text-primary">4.5 / 5</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                                {{-- <p><strong>Payout Speed</strong></p> --}}
                                                {{-- <p>Up to 3 days</p> --}}
                                                <div class="border rounded-3 p-2">
                                                    <span>Code:</span>
                                                    <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : 'Không' }}</strong>
                                                </div>
                                            </div>
                                
                                            <div class="col-12 text-center mt-3">
                                                {{-- <a href="#" class="btn btn-primary w-100 mb-2">Visit Site</a> --}}
                                                {{-- <button class="btn btn-outline-secondary w-100">Show Details</button> --}}
                                                <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1 d-flex">
                                                    <span class="ms-auto me-auto">Chi tiết <i class="fa-duotone fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const scrollContainer = document.getElementById('hotBookersScroll');
                
                scrollContainer.addEventListener('wheel', function(e) {
                    if (
                        (e.deltaY > 0 && scrollContainer.scrollLeft < scrollContainer.scrollWidth - scrollContainer.clientWidth) ||
                        (e.deltaY < 0 && scrollContainer.scrollLeft > 0)
                    ) {
                        e.preventDefault();
                        scrollContainer.scrollLeft += e.deltaY;
                    }
                });
            });
        </script>
        
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