<link rel="stylesheet" href="{{ asset('bet/booker-slider.css') }}">
<link rel="stylesheet" href="{{ asset('bet/swiper/swiper-bundle.min.css') }}">
<div class="container swiper mt-3 mb-3">
    <div class="card-booker-wrapper">
        <ul class="card-booker-list swiper-wrapper">
            @foreach ($hot_bookers as $booker)
            @if($booker->getAvailableLang())
            @php
                $booker = $booker->getAvailableLang();
            @endphp
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
                @endif
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
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1400: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });
</script>
