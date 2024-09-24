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
        <div class="container-fluid mt-5">
            <div class="row">
                <!-- Left column for categories -->
                <div class="col-md-3 bg-light p-3">
                    <h4 class="ms-1">Hạng mục</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/booker">Tất cả</a></li>
                        @foreach ($categories as $category)
                            <li class="list-group-item"><a href="{{ route('booker.detail', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
    
                <!-- Right column for bookers -->
                <div class="col-md-9 mt-3">
                    <h1>{{isset($currentCategory->name)?'Danh sách nhà cái "'.$currentCategory->name.'"':'Danh sách nhà cái'}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{'Danh sách nhà cái'}}</li>
                    </ol>
                    <div class="main-content">
                    <div class="row top-hot-bookers">
                        <div class="col">
                            @if ($hot_bookers->count() > 0)
                                <h1 class="mt-3">Trang uy tín HOT</h1>
                            @endif
                            <div class="scrolling-wrapper" id="hotBookersScroll">
                                @foreach($hot_bookers as $booker)
                                    <div class="card card-scroll m-4 mb-5 border-0 rounded-3 shadow-lg" style="width: 300px;">
                                        <img src="{{ $booker->image }}" class="card-img-top" alt="{{ $booker->name }}" style="max-height: 90px; object-fit: scale-down;">
                                        <div class="card-body">
                                            <div class="text-center">
                                                @foreach ($booker->categories as $category)
                                                    <span class="badge bg-success">{{ $category->name }}</span>
                                                @endforeach
                                                <h5 class="card-title">{{ $booker->name }}</h5>
                                                <p class="card-text">Desc: {{ $booker->description }}</p>
                                            </div>
                                            <div class="border rounded p-2 text-center">
                                                <span>Code:</span>
                                                <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : 'Không' }}</strong>
                                            </div>
                                            
                                            <div class="d-flex gap-2 justify-content-center align-items-center mt-3">
                                                <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1 d-flex">
                                                    Chi tiết <i class="fa-duotone fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
    
                    <div class="row all-bookers">
                        <div class="col">
                            @if ($bookers->count() > 0)
                                <h1 class="mb-3">Các trang khác</h1>
                            @endif
                            <div class="list-group">
                                @foreach($bookers as $booker)
                                <div class="container mb-4">
                                    <!-- Promo Card -->
                                    <div class="card p-3 border-0 rounded-3 shadow-lg">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2 text-center">
                                                <img src="{{ $booker->image }}" alt="Dafabet Logo" class="img-fluid">
                                            </div>
                                            <div class="col-9 col-md-4">
                                            @foreach ($booker->categories as $category)
                                                <span class="badge bg-success">{{ $category->name }}</span>
                                            @endforeach
                                            <h5 class="card-title">{{ $booker->name }}</h5>
                                                <p class="mt-2 mb-1"><strong>Desc: {{ $booker->description }}</strong></p>
                                                <small class="text-muted">
                                                    {{ Str::limit(strip_tags($booker->content), 100, '...') }}
                                                </small>
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
                                                <div class="border rounded p-2">
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