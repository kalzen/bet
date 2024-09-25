@extends('layouts.master')
@section('meta')
<title>{{$post->title}}</title>
<meta name="keywords" content="{{collect($post->tags)->pluck('name')->join(',')}}"/>
<meta name="description" content="{{substr(strip_tags($post->description),0,300)}}"/>
<meta property="og:image" content="{{$post->images()->first()->url??''}}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$post->title}}">
<meta property="og:description" content="{{substr(strip_tags($post->description),0,300)}}">
@stop
@section('content')
<div class="content-wrap ">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-lg-8 blog-detail">
                    <div class="subtitle mb-15 font-size-15 fw-medium text-gray-dark">{{$post->categories->first()->name}} <!--<span class="sep-dot"></span> {{date('d/m/Y',strtotime($post->updated_at))}} --></div>
                    <h1 class="mb-20">{{$post->title}}</h1>
				{!!$post->content!!}
                <div class="container mt-4">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-12 col-md-4 d-flex justify-content-center mb-3 mb-md-0">
                                <img src="https://vnbettest.com/bet/logo.png" alt="{{ $post->user->name }}" class="img-fluid rounded-circle" style="max-width: 200px;max-height: 140px">
                            </div>
                            <a href="{{ route('user.detail', ['id' => $post->user->id]) }}" class="col-12 col-md-8">
                                <div class="card-body text-center text-md-start">
                                    <h4>Tác giả</h4>
                                    <h5 class="card-title mb-1">{{ $post->user->name }}</h5>
                                    <p class="card-text mb-1">{{ $post->user->description }}</p>
                                    <p class="card-text mb-1"><small class="text-muted">Email: {{ $post->user->email }}</small></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
               </div>
			   <div class="col-lg-4">
			   <h4 class="mrb-30 single-blog-widget-title">Danh mục</h4>
                    <ul class="list">
                        <li><i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i>
                            <a class="ms-1" href="{{ route('post.list') }}">Tất cả</a></li>
                        @foreach($categories as $category)
                            <li><i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i>
                                <a class="ms-1" href="{{ route('post.category', ['alias' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
				</div>
			</div>
        </div>
    </div><!-- Footer-->
@endsection