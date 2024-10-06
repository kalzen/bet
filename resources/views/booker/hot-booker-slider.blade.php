<link rel="stylesheet" href="{{ asset('bet/booker-slider.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
<div class="container swiper mt-3 mb-3">
    <div class="card-wrapper">
        <ul class="card-list swiper-wrapper">
            @foreach ($hot_bookers as $booker)
                <li class="card-item swiper-slide">
                    <div class="card-link">
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
                <li class="card-item swiper-slide">
                    <div class="card-link">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<script>
    new Swiper('.card-wrapper', {
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
