<link rel="stylesheet" href="{{ asset('bet/booker-slider.css') }}">
<style>
    .card-booker-wrapper {
        max-width: 1100px;
        margin: 0 60px 35px;
        padding: 20px 10px;
        overflow: hidden;
    }

    .card-booker-list .card-booker-item {
        list-style: none;
    }

    .card-booker-list .card-booker-item .card-booker-link {
        /* width: 400px; */
        user-select: none;
        display: block;
        background: #fff;
        padding: 18px;
        border-radius: 20px;
        text-decoration: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: 0.2s ease;
    }

    .card-booker-list .card-booker-item .card-booker-link:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-color: #e0e0e0;

    }

    .card-booker-list .card-booker-link .card-booker-image {
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: cover;
        border-radius: 10px;
    }

    .card-booker-list .card-booker-link .badge {
        color: blueviolet;
        padding: 8px 16px;
        font-size: 0.95rem;
        font-weight: 500;
        margin: 16px 0 18px;
        background: azure;
        width: fit-content;
        border-radius: 50px;
    }

    .card-booker-list .card-booker-link .card-booker-title {
        font-size: 1.19rem;
        color: #000;
        font-weight: 600;
    }

    .card-booker-list .card-booker-link .card-booker-button {
        height: 35px;
        width: 35px;
        color: #5372f0;
        border-radius: 50%;
        margin: 30px 0 5px;
        background: none;
        cursor: pointer;
        border: 2px solid #5372f0;
        transform: rotate(-45deg);
        transition: 0.4s ease;
    }

    .card-booker-list .card-booker-link:hover .card-booker-button {
        color: #fff;
        background: #5372f0;
    }

    .card-booker-wrapper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        text-align: center;
        line-height: 10px;
        font-size: 12px;
        color: #000;
        opacity: 1;
        background: rgba(0, 0, 0, 0.2);
    }

    .card-booker-wrapper .swiper-pagination-bullet-active {
        color: #fff;
        background: #f05353;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #f05353 !important;
    }
</style>
<link rel="stylesheet" href="{{ asset('bet/swiper/swiper-bundle.min.css') }}">
<div class="container swiper mt-3 mb-3">
    <div class="card-booker-wrapper">
        <ul class="card-booker-list swiper-wrapper">
            @foreach ($hot_bookers as $booker)
                <li class="card-booker-item swiper-slide">
                    <div class="card-booker-link">
                        <!-- Circle number -->
                        <div class="position-absolute top-30 start-30  bg-danger rounded-circle"
                            style="width: 30px; height: 30px; line-height: 30px; text-align: center; color: white; font-weight: bold; font-size: 15px">
                            {{ $loop->iteration }}
                        </div>

                        <!-- Image section -->
                        <div class="text-center mb-3">
                            <img src="{{ $booker->image }}" alt="Logo" class="img-fluid rounded-3"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                        </div>

                        <!-- Title section -->
                        <div class="text-center mb-3" style="min-height: 108px;">
                            <h5 class="fw-bold">{{ $booker->name }}</h5>
                            <p class="text-warning mb-0">★ ★ ★ ★ ★</p>
                            <small class="text-muted mb-0">{{ Str::limit($booker->description, 48, '...') }}</small>
                            <div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-wrap gap-1">
                            <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1 w-100">
                                <span class="ms-auto me-auto">{{ __('home.detail') }}</span> <i
                                    class="fa-duotone fa-arrow-right"></i>
                            </a>
                            <a href="{{ $booker->url }}" class="prd-btn-2 w-100">
                                <span class="ms-auto me-auto">{{ __('home.bet') }}</span> <i
                                    class="fa-duotone fa-arrow-right"></i>
                            </a>
                            {{-- <span class="me-2">{{ __('booker.list.code') }}:</span>
                                <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : __('booker.list.no') }}</strong> --}}
                        </div>
                    </div>
                </li>
            @endforeach
            @foreach ($hot_bookers as $booker)
                <li class="card-booker-item swiper-slide">
                    <div class="card-booker-link">
                        <!-- Circle number -->
                        <div class="position-absolute top-30 start-30  bg-danger rounded-circle"
                            style="width: 30px; height: 30px; line-height: 30px; text-align: center; color: white; font-weight: bold; font-size: 15px">
                            {{ $loop->iteration }}
                        </div>

                        <!-- Image section -->
                        <div class="text-center mb-3">
                            <img src="{{ $booker->image }}" alt="Logo" class="img-fluid rounded-3"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                        </div>

                        <!-- Title section -->
                        <div class="text-center mb-3" style="min-height: 108px;">
                            <h5 class="fw-bold">{{ $booker->name }}</h5>
                            <p class="text-warning mb-0">★ ★ ★ ★ ★</p>
                            <small class="text-muted mb-0">{{ Str::limit($booker->description, 48, '...') }}</small>
                            <div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-wrap gap-1">
                            <a href="{{ route('booker.detail', $booker->id) }}" class="prd-btn-1 w-100">
                                <span class="ms-auto me-auto">{{ __('home.detail') }}</span> <i
                                    class="fa-duotone fa-arrow-right"></i>
                            </a>
                            <a href="{{ $booker->url }}" class="prd-btn-2 w-100">
                                <span class="ms-auto me-auto">{{ __('home.bet') }}</span> <i
                                    class="fa-duotone fa-arrow-right"></i>
                            </a>
                            {{-- <span class="me-2">{{ __('booker.list.code') }}:</span>
                                <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : __('booker.list.no') }}</strong> --}}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="swiper-pagination mt-3"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script> --}}
<!-- swiper js -->
<script src="{{ asset('bet/swiper/swiper-bundle.min.js') }}"></script>
<script>
    new Swiper('.card-booker-wrapper', {
        // Optional parameters
        // direction: 'vertical',
        loop: true,
        spaceBetween: 30,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        // },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        }
    });
</script>
