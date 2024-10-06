<link rel="stylesheet" href="{{ asset('bet/booker-slider.css') }}">
<div id="myBookers" class="carousel slide container-fluid" data-bs-ride="carousel">
    <div class="carousel-inner w-100">
        {{-- <div class="carousel-item active">
            <div class="col-md-3">
                <div class="card card-body">
                    <img class="img-fluid" src="https://via.placeholder.com/640x360?text=1">
                </div>
            </div>
        </div> --}}
        @foreach ($hot_bookers as $booker)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }} text-decoration-none">
                <div class="container-fluid col-md-4 col-lg-3 col-10 pt-3">
                    <div href="{{ route('booker.detail', $booker->id) }}" class="card shadow-sm p-3 mb-4 border-0"
                        style="position: relative; border-radius: 20px;">
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
                                <span class="ms-auto me-auto">{{ __('home.detail') }}</span> <i class="fa-duotone fa-arrow-right"></i>
                            </a>
                            <a href="{{ $booker->url }}" class="prd-btn-2 w-100">
                                <span class="ms-auto me-auto">{{ __('home.bet') }}</span> <i class="fa-duotone fa-arrow-right"></i>
                            </a>
                            {{-- <span class="me-2">{{ __('booker.list.code') }}:</span>
                        <strong>{{ isset($booker->codes) && $booker->codes->isNotEmpty() ? $booker->codes->first()->name : __('booker.list.no') }}</strong> --}}

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myBookers" data-bs-slide="prev">
        <span class="fas fa-chevron-left" style="color: black; font-size: 30px;" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myBookers" data-bs-slide="next">
        <span class="fas fa-chevron-right" style="color: black; font-size: 30px;" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script src="{{asset('bet/jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function() {
        var minPerSlide = 6; // Minimum items per slide

        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 4;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const myBookers = document.querySelector('#myBookers');
        let touchStartX = 0;
        let touchEndX = 0;
        const swipeThreshold =
            50; // Adjust the threshold to make it more responsive (lower for faster detection)

        myBookers.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        myBookers.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            requestAnimationFrame(handleSwipe); // Use requestAnimationFrame for smoother transitions
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - swipeThreshold) {
                // Swipe left, go to the next slide
                myBookers.querySelector('.carousel-control-next').click();
            } else if (touchEndX > touchStartX + swipeThreshold) {
                // Swipe right, go to the previous slide
                myBookers.querySelector('.carousel-control-prev').click();
            }
        }
    });
</script>
