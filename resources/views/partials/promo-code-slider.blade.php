<link rel="stylesheet" href="{{ asset('bet/promo-code-slider.css') }}">
<link rel="stylesheet" href="{{ asset('bet/swiper/swiper-bundle.min.css') }}">
<div class="container-fluid swiper">
    <div class="row aos-init card-promo-code-wrapper" data-aos="fade-up" data-aos-delay="50">
        <ul class="card-promo-code-list swiper-wrapper">
            @foreach ($codes as $code)
            @if (!$code->booker->getAvailableLang())
                @continue
            @endif
            {{-- @dd($code); --}}
            @php
                $booker = $code->booker->getAvailableLang()??$code->booker;
            @endphp
                <li class="card-promo-code-item swiper-slide">


                    <div class="item-promo text-center mr-3 mb-3">
                        @if($code->booker)
                            <img class="slider_item_img rounded-3" src="{{ $booker->image }}" alt=""
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                        @else
                            <img class="slider_item_img" src="https://via.placeholder.com/400x300" alt="">
                        @endif
                        <span>{{ $code->description ?? ($booker->description ?? '') }}</span>
                        <div class="code mt-4 justify-content-center">
                            {{ $code->name }}
                    </div>
                        @if($booker)
                            <a href="{{ route('booker.detail', ['locale_code' => $shared_locale, 'alias' => $booker->langParent??$booker->langParent->id??$booker->id]) }}" class="prd-btn-1 d-flex mt-3">
                                <span class="ms-auto me-auto">{{ __('home.view_now') }}<i
                                        class="fa-duotone fa-arrow-right"></i></span>
                            </a>
                        @else
                            <span class="prd-btn-1 d-flex mt-3 disabled">
                                <span class="ms-auto me-auto">{{ __('home.view_now') }}<i
                                        class="fa-duotone fa-arrow-right"></i></span>
                            </span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="swiper-pagination mt-3"></div>
        {{-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> --}}
    </div>
</div>
<script src="{{ asset('bet/swiper/swiper-bundle.min.js') }}"></script>
<script>
    new Swiper('.card-promo-code-wrapper', {
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
