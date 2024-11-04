@extends('layouts.master')
@section('meta')
    @if (isset($category))
        <title>{{ $category->name }} - {{ env('APP_NAME') }}</title>
        <meta name="keywords" content="{{ $category->tags->pluck('name')->join(', ') }}" />
        <meta name="description" content="{{ $category->description }}" />
        <meta property="og:image" content="{{ $category->image ? $category->image->url : '' }}">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $category->name }}">
        <meta property="og:description" content="{{ $category->description }}">
    @else
        <title>Tin tức - {{ env('APP_NAME') }}</title>
        <meta name="keywords" content="{{ env('APP_NAME') }}" />
        <meta name="description" content="{{ env('APP_NAME') }}" />
        <meta property="og:image" content="{{ env('APP_LOGO') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ env('APP_NAME') }}">
        <meta property="og:description" content="{{ env('APP_NAME') }}">
    @endif
@stop
@section('content')
    <div class="prd-breadcrumb">
        <div class="container">
            <div class="brd-content">
                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in"
                    class="aos-init aos-animate">
                    <span class="sub-title">{{ __('post.list.news') }}</span>
                </div>
                <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500"
                    data-aos-easing="ease-in">{{ __('post.list.latest_news') }}</h2>
                <div class="page-direction">
                    <ul>
                        <li>
                            <span class="icon"><i class="fa-solid fa-house"></i></span>
                            <span class="text">{{ __('post.list.home') }}</span>
                        </li>
                        <li>
                            <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                            <span class="text">{{ __('post.list.news') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-posts">
        {{-- <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="0" data-aos-duration="200"
            data-aos-easing="ease-in">
            <h3 class="sub-title pt-2">{{ __('post.list.news') }}</h3>
            <h2 class="title">{{ __('post.list.latest_news') }}</h2>
        </div> --}}
        <div class="global-shape style-3">
            <img src="{{ asset('bet/shape-1.png') }}" alt="" data-aos="fade-left"
                data-aos-duration="500" data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400"
                class="aos-init">
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-12">
                    <div class="row g-4">
                        @php
                            $rightSidePosts = collect();
                            $leftSidePosts = collect();
                            $counter = 1;
                            foreach ($posts as $post) {
                                if ($counter % 3 == 0) {
                                    $rightSidePosts->push($post);
                                } else {
                                    $leftSidePosts->push($post);
                                }
                                $counter++;
                            }
                            $flip = false;
                        @endphp
                        {{-- post 1 - horizonal side image left --}}
                        @foreach ($leftSidePosts as $post)
                            @if ($post->getAvailableLang())
                                @php
                                    $lang_post = $post->getAvailableLang();
                                @endphp

                                @if (($loop->index + 1) % 2 == 0)
                                    @php $flip = true; @endphp
                                @else
                                    @php $flip = false; @endphp
                                @endif
                                <div class="col-xl-12 col-lg-12 col-md-6 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100" data-aos-duration="500" data-aos-easing="ease-in">
                                    <div class="single-blog @if ($flip) right-side-img @endif">
                                        @if (!$flip)
                                            <div class="part-img">
                                                <img class="img-fluid h-100 w-100 rounded-3"
                                                    style="object-fit: cover; object-position: center;"
                                                    src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/400x300' }}"
                                                    alt="{{ $post->lang_post }}"
                                                    onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                            </div>
                                        @endif
                                        <div class="part-text">
                                            <span
                                                class="post-category">{{ $post->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}</span>
                                            <h3 class="blog-post-title">
                                                <a href="{{ route('post.detail', ['alias' => $lang_post->slug]) }}">
                                                    {{ $lang_post->title }}</a>
                                            </h3>
                                            <p>{{ Str::limit($lang_post->description, 100) }}</p>
                                            <div class="post-info-stats">
                                                <a href="{{ route('user.detail', ['id' => $post->user->id]) }}"
                                                    class="post-creator">
                                                    <div class="creator-pic">
                                                        <img src="{{ $shared_config['logo']['value'] }}"
                                                            alt="{{ $post->user->name }}">
                                                    </div>
                                                    <span class="creator-name">{{ $post->user->name }}</span>
                                                </a>
                                                <span class="posting-time">{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        @if ($flip)
                                            <div class="part-img">
                                                <img class="img-fluid h-100 w-100 rounded-3"
                                                    style="object-fit: cover; object-position: center;"
                                                    src="{{ $lang_post->images->first()->url ?? 'https://via.placeholder.com/400x300' }}"
                                                    alt="{{ $lang_post->title }}"
                                                    onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="row g-4">
                        {{-- post 3 - vertical side --}}
                        @foreach ($rightSidePosts as $post)
                            @if ($post->getAvailableLang())
                                @php
                                    $lang_post = $post->getAvailableLang();
                                @endphp

                                <div class="col-xl-12 col-lg-12 col-md-6 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100" data-aos-duration="500" data-aos-easing="ease-in">
                                    <div class="single-blog vertical-style">
                                        <div class="part-img">
                                            <img class="img-fluid h-100 w-100 rounded-3"
                                                style="object-fit: cover; object-position: center;"
                                                src="{{ $lang_post->images->first()->url ?? 'https://via.placeholder.com/400x300' }}"
                                                alt="{{ $lang_post->title }}"
                                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x300';">
                                        </div>
                                        <div class="part-text">
                                            <span
                                                class="post-category">{{ $post->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized')  }}</span>
                                            <h3 class="blog-post-title">
                                                <a href="{{ route('post.detail', ['alias' => $lang_post->slug]) }}">
                                                    {{ $lang_post->title }}</a>
                                            </h3>
                                            <p>{{ Str::limit($lang_post->description, 100) }}</p>
                                            <div class="post-info-stats">
                                                <a href="{{ route('user.detail', ['id' => $post->user->id]) }}"
                                                    class="post-creator">
                                                    <div class="creator-pic">
                                                        <img src="{{ $shared_config['logo']['value'] }}"
                                                            alt="{{ $post->user->name }}">
                                                    </div>
                                                    <span class="creator-name">{{ $post->user->name }}</span>
                                                </a>
                                                <span
                                                    class="posting-time">{{ $lang_post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- end post 3 --}}

                    </div>
                </div>
            </div>
            <div class="pok-pagination aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                data-aos-easing="ease-in">
                <ul>
                    <li>
                        <a href="#0"><i class="fa-solid fa-angles-left"></i></a>
                    </li>
                    <li>
                        <a href="#0">01</a>
                    </li>
                    <li>
                        <a href="#0" class="active">02</a>
                    </li>
                    <li>
                        <a href="#0">03</a>
                    </li>
                    <li class="dotted">
                        <i class="fa-solid fa-ellipsis"></i>
                    </li>
                    <li>
                        <a href="#0">15</a>
                    </li>
                    <li>
                        <a href="#0">16</a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa-solid fa-angles-right"></i></a>
                    </li>
                </ul>
            </div>
            <div class="pok-sidebar aos-init" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500"
                data-aos-easing="ease-in">
                <div class="row">
                    <div class="col-xl-4 col-lg-12 aos-init" data-aos="fade-up" data-aos-delay="250"
                        data-aos-duration="500" data-aos-easing="ease-in">
                        <div class="single-element recent-postss">
                            <h4 class="title">{{ __('post.list.recent') }}</h4>
                            <div class="recent-post-slider owl-carousel owl-theme owl-loaded">

                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(-987px, 0px, 0px); transition: linear; width: 2306px;">
                                        @if(count($posts) > 0)
                                            @for ($i = 0; $i < count($posts); $i += 2)
                                            @if (isset($posts[$i]) && isset($posts[$i+1]) && !$posts[$i+1]->getAvailableLang() && !$posts[$i]->getAvailableLang())
                                                @continue;
                                            @endif
                                                <div class="owl-item" style="width: 329.328px;">
                                                    <div class="recent-posts">
                                    
                                                        <!-- First post -->
                                                        @if (isset($posts[$i]) && $posts[$i]->getAvailableLang())
                                                            @php 
                                                                $post1 = $posts[$i]; 
                                                                $lang_post1 = $post1->getAvailableLang(); 
                                                            @endphp
                                                            <div class="single-recent-post">
                                                                <div class="part-text">
                                                                    <h5 class="post-title">
                                                                        <a href="{{ route('post.detail', ['alias' => $lang_post1->slug]) }}">
                                                                            {{ $lang_post1->title }}
                                                                        </a>
                                                                    </h5>
                                                                    <div class="post-stats">
                                                                        <span class="text">
                                                                            {{ __('post.list.by') }} 
                                                                            <a class="posted-by" href="{{ route('user.detail', ['id' => $post1->user->id]) }}">
                                                                                {{ $post1->user->name }}
                                                                            </a>
                                                                        </span>
                                                                        <span class="text">
                                                                            {{ __('post.list.in') }} 
                                                                            <a class="category-by" href="{{ $post1->categories->first() ? route('post.category', ['alias' => $post1->categories->first()->slug]) : '#' }}">
                                                                                {{ $post1->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                    
                                                        <!-- Second post -->
                                                        @if (isset($posts[$i + 1]) && $posts[$i + 1]->getAvailableLang())
                                                            @php 
                                                                $post2 = $posts[$i + 1]; 
                                                                $lang_post2 = $post2->getAvailableLang(); 
                                                            @endphp
                                                            <div class="single-recent-post">
                                                                <div class="part-text">
                                                                    <h5 class="post-title">
                                                                        <a href="{{ route('post.detail', ['alias' => $lang_post2->slug]) }}">
                                                                            {{ $lang_post2->title }}
                                                                        </a>
                                                                    </h5>
                                                                    <div class="post-stats">
                                                                        <span class="text">
                                                                            {{ __('post.list.by') }} 
                                                                            <a class="posted-by" href="#">
                                                                                {{ $post2->user->name }}
                                                                            </a>
                                                                        </span>
                                                                        <span class="text">
                                                                            {{ __('post.list.in') }} 
                                                                            <a class="category-by" href="#">
                                                                                {{ $post2->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                    
                                                    </div>
                                                </div>
                                            @endfor
                                        @else
                                            <p>{{ __('post.list.empty') }}</p>
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"><img
                                            src="https://peredion.netlify.app/assets/img/testimonial/left-arrow.png"></button><button
                                        type="button" role="presentation" class="owl-next"><img
                                            src="https://peredion.netlify.app/assets/img/testimonial/right-arrow.png"></button>
                                </div>
                                <div class="carousel-custom-dots d-none"><button role="button"
                                        class="owl-dot"><span></span></button><button role="button"
                                        class="owl-dot active"><span></span></button><button role="button"
                                        class="owl-dot"><span></span></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="300"
                                data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-element posts-category">
                                    <h4 class="title">{{ __('post.list.post_categories') }}</h4>
                                    <ul class="category-list">
                                        @foreach ($categories as $category)
                                            @if ($category->getAvailableLang())
                                                <li>
                                                    <a href="{{ route('post.category', ['alias' => $category->slug]) }}">
                                                        <span
                                                            class="cl-cat">{{ $category->getAvailableLang()->name }}</span>
                                                        <span class="q-numb">({{ $category->posts->count() }})</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="350"
                                data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-element tag-lines">
                                    <h4 class="title">{{ __('post.list.tagline') }}</h4>
                                    <div class="tag-words">
                                        @foreach ($tags as $tag)
                                            <a href="#" class="single-tag">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search-bar-element aos-init" data-aos="fade-up" data-aos-delay="400"
                            data-aos-duration="500" data-aos-easing="ease-in">
                            <form>
                                <input type="text" placeholder="{{ __('post.list.search_placeholder') }}">
                                <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            console.log('Post index ready')
        })
    </script>
@endsection
