@extends('layouts.master')
@section('meta')
@if(isset($catalogue))
    <title>{{$catalogue->name}} - {{env('APP_NAME')}}</title>
    <meta name="keywords" content="{{$catalogue->tags->pluck('name')->join(', ')}}" />
    <meta name="description" content="{{$catalogue->description}}" />
    <meta property="og:image" content="{{$catalogue->image->url ?? ''}}">
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{$catalogue->name}}">
    <meta property="og:description" content="{{$catalogue->description}}">
@else
    <title>Sản phẩm - {{env('APP_NAME')}}</title>
    <meta name="keywords" content="{{env('APP_NAME')}}" />
    <meta name="description" content="{{env('APP_NAME')}}" />
    <meta property="og:image" content="{{env('APP_LOGO')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{env('APP_NAME')}}">
    <meta property="og:description" content="{{env('APP_NAME')}}">
@endif
@stop
@section('content')
<div class="col-full">
    <div class="row">
       
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="shop-control-bar">
                    <h1 class="woocommerce-products-header__title page-title">Kết quả tìm kiếm: "{{$request->s}}"</h1>
                   


                </div>
                <!-- .shop-control-bar -->
                <div class="tab-content">
                    <!-- .tab-pane -->
                    <div id="list-view-large" class="tab-pane active" role="tabpanel">
                        <div class="woocommerce columns-1">
                            <div class="products">
                                @if($packages->count() == 0)
                                    <h3>Không có sản phẩm phù hợp</h3>
                                @endif
                            @foreach ($packages as $package)
                            @if ($package->products->count())
                                <div class="product list-view-large first ">
                                    <div class="media">
                                        <img id="thumbpack-{{$package->id}}" width="224" height="197" alt=""
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            src="{{$package->products->first()->images->first()->url ?? ''}}">
                                        <div class="media-body">
                                            <div class="product-info">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Yêu thích</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="{{ route('product.detail',['alias' => $package->products->first()->slug]) }}">
                                                    <h2 class="woocommerce-loop-product__title">{{$package->name}}</h2>
                                                    
                                                </a>
                                                <!-- .brand -->
                                                @if(isset($package->options) && $package->options!= null)
                                                @foreach (json_decode($package->options) as $option)
                                                @if($option->fmyChipType == "COLOR")
                                                    <div class="d-flex align-items-center justify-content-start mt-2">
                                                    @foreach($option->optionList as $color)
                                                    <a data-package="{{$package->id}}"  data-code="{{$color->optionName}}" class="getThumb @if($loop->index==0) active @endif">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            viewBox="0 0 50 50">
                                                            <g transform="translate(-18.001 9)">
                                                                <rect width="25" height="25" transform="translate(18.001 -9)"
                                                                    fill="none"></rect>
                                                                <path d="M18,0A18,18,0,1,1,0,18,18,18,0,0,1,18,0Z"
                                                                    transform="translate(18.001 -9)" fill="{{$color->optionCode}}">
                                                                </path>
                                                                <path
                                                                    d="M18,1A17,17,0,0,0,5.979,30.019,17,17,0,1,0,30.02,5.979,16.889,16.889,0,0,0,18,1m0-1A18,18,0,1,1,0,18,18,18,0,0,1,18,0Z"
                                                                    transform="translate(18.001 -9)" fill="rgba(0,0,0,0.5)"></path>
                                                            </g>
                                                        </svg>
                                                        </a>
                                                    @endforeach
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center justify-content-start mt-2">
                                                    @foreach($option->optionList as $other)
                                                    <span data-package="{{$package->id}}" data-name="{{$option->fmyChipType}}" data-value="{{$other->optionCode}}" class="border border-black rounded-pill option-chips getprice">{{$other->optionLocalName}}</span>
                                                    @endforeach 
                                                    </div>
                                                @endif
                                                @endforeach
                                                @endif
                                                <div class="woocommerce-product-details__short-description mt-2">
                                                    <ul>
                                                    @if (isset(json_decode($package->json_data, true)['modelList'][0]['uspDescription']))
                                                    @foreach (json_decode($package->json_data, true)['modelList'][0]['uspDescription'] as $item) 
                                                                    
                                                    <li>{!! $item !!}</li>          
                                                         
                                                    @endforeach
                                                    @endif
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">{{$package->products->first()->code}}</span>
                                                </span>
                                            </div>
                                            <!-- .product-info -->
                                            <div class="product-actions">
                                                <div class="availability">
                                                    Tình trạng:
                                                    <p class="stock in-stock">Còn hàng</p>
                                                </div>
                                                <span class="price">
                                                    <span id="package-{{$package->id}}" class="woocommerce-Price-amount amount">
                                                    @if($package->products->first()->price) {{number_format($package->products->first()->price)}}đ @else Liên hệ @endif</span>
                                                </span>
                                                <!-- .price -->
                                                <a id="cart-{{$package->id}}" data-model="{{$package->products->first()->code}}" class="button add_to_cart_button" href="#">Thêm giỏ hàng</a>
                                                <a class="add-to-compare-link" href="#">So sánh</a>
                                            </div>
                                            <!-- .product-actions -->
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .product -->
                                 @endif
                            @endforeach
                            </div>
                            <!-- .products -->
                        </div>
                        <!-- .woocommerce -->
                    </div>
                </div>
                <!-- .shop-control-bar-bottom -->
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
        <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                            
                        </div>
    </div>
    <!-- .row -->
</div>
@endsection