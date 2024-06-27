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
            <div class="row pt-60 pb-60">
                <div class="col-12 col-lg-8 blog-detail">
                    <div class="subtitle mb-15 font-size-15 fw-medium text-gray-dark">{{$post->categories->first()->name}} <!--<span class="sep-dot"></span> {{date('d/m/Y',strtotime($post->updated_at))}} --></div>
                    <h1 class="mb-20">{{$post->title}}</h1>
				{!!$post->content!!}
               </div>
			   <div class="col-lg-4">
			   <h4 class="mrb-30 single-blog-widget-title">Danh mục</h4>
							<ul class="list">
                            @foreach($categories as $category)
								<li><i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i><a href="{{ route('post.category', ['alias' => $category->slug]) }}">{{ $category->name }}</a></li>
							@endforeach
                            </ul>
				</div>
			</div>
        </div>
    </div><!-- Footer-->
@endsection