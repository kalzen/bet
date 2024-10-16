@extends('layouts.master')
@php
    $post = $post->langParent ?? $post;
    $lang_post = $post->getAvailableLang() ?? $post;
@endphp
@section('meta')
    <title>{{ $lang_post->title }}</title>
    <meta name="keywords" content="{{ collect($post->tags)->pluck('name')->join(',') }}" />
    <meta name="description" content="{{ substr(strip_tags($lang_post->description), 0, 300) }}" />
    <meta property="og:image" content="{{ $lang_post->images()->first()->url ?? '' }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $lang_post->title }}">
    <meta property="og:description" content="{{ substr(strip_tags($lang_post->description), 0, 300) }}">
@stop
@section('content')
<div class="prd-breadcrumb">
    <div class="container">
        <div class="brd-content">
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in" class="aos-init aos-animate">
                <span class="sub-title">{{ __('post.list.news') }}</span>
            </div>    
            <h2 class="title aos-init aos-animate" data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">{{ $lang_post->title }}</h2>
            <div class="page-direction">
                <ul>
                    <li>
                        <span class="icon"><i class="fa-solid fa-house"></i></span>
                        <span class="text">{{ __('post.list.home') }}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa-light fa-caret-right fa-xl"></i></span>
                        <span class="text">{{ __('post.detail.news_detail') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="blog-details">
        <div class="global-shape style-3">
            <img src="assets/img/shapes/shape-1.png" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400" class="aos-init aos-animate">
        </div>
        <div class="container">
            <div class="post-element">
                <div class="post-stats aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <span class="category-name">{{ $post->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}</span>
                    <span class="posted-time">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <h2 class="post-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500"
                    data-aos-easing="ease-in"><span>{{ $lang_post->title }}</span></h2>
                <div class="author-info aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="500" data-aos-easing="ease-in">
                    <div class="author-pic">
                        <img src="{{ asset('bet/logo.png') }}" alt="">
                    </div>
                    <div class="author-descr">
                        <span class="auth-name">{{ $post->user->name }}</span>
                        <span class="break-icon">/</span>
                        <span class="auth-designation">{{ $post->user->email }}</span>
                    </div>
                </div>
                {!! $lang_post->content !!}
            </div>
            <div class="post-comment-element">
                <div class="post-comment-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="550"
                    data-aos-duration="500" data-aos-easing="ease-in">
                    <div class="commentor-pic">
                        <img src="assets/img/blog/random-user.png" alt="">
                    </div>
                    <div class="part-form">
                        <form>
                            <input type="text" placeholder="{{ __('post.detail.write_comment') }}">
                            <button type="submit">
                                <i class="fa-light fa-feather"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="all-comments aos-init aos-animate" data-aos="fade-up" data-aos-delay="600"
                    data-aos-duration="500" data-aos-easing="ease-in">
                    <h4 class="element-titl">
                        <span>{{ __('post.detail.all_comments') }} ({{ count($lang_post->comments) }})</span>
                    </h4>
                    <div>
                        @foreach ($lang_post->comments as $comment)
                            <div class="single-comment">
                                <div class="commentor-pic">
                                    <img src="assets/img/blog/random-user.png" alt="">
                                </div>
                                <div class="part-comment-info">
                                    <div class="comment-stats">
                                        <span class="commentator-name">{{ $comment->author ?? __('post.detail.anonymous') }}</span>
                                        <span class="commented-time">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p>{{ $comment->body }}</p>
                                    <div class="comment-into-social">
                                        <a href="#0" class="single-social love-reaction">
                                            <span class="icon love-icon"><i class="fa-regular fa-heart"></i></span>
                                            <span class="social-text loved-number">0</span>
                                        </a>
                                        <a href="#0" class="single-social">
                                            <span class="icon comment-icon"><i class="fa-regular fa-comment"></i></span>
                                            <span class="social-text">{{ __('post.detail.reply') }}</span>
                                        </a>
                                        <a href="#0" class="single-social">
                                            <span class="icon share-icon"><i class="fa-regular fa-paper-plane"></i></span>
                                            <span class="social-text">{{ __('post.detail.share') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- <div class="recommended-post-element aos-init aos-animate" data-aos="fade-up" data-aos-delay="550"
                data-aos-duration="500" data-aos-easing="ease-in">
                <h4 class="element-title">
                    <span>Recommended articles</span>
                </h4>
                <div class="recommended-post-slider owl-carousel owl-theme owl-loaded owl-drag">


                    <div class="owl-stage-outer">
                        
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
