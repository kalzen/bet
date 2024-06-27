@extends('layouts.master')
@section('meta')
<title>{{$product->title}}</title>
<meta name="keywords" content="{{collect($product->tags)->pluck('name')->join(',')}}" />
<meta name="description" content="{{substr(strip_tags($product->description), 0, 300)}}" />
<meta property="og:image" content="{{$product->images()->first()->url ?? ''}}">
<meta property="og:type" content="product">
<meta property="og:title" content="{{$product->title}}">
<meta property="og:description" content="{{substr(strip_tags($product->description), 0, 300)}}">
@stop
@section('styles')
@endsection
@section('content')
<div class="topnav">
    <div class="col-full">
    <div class="d-flex bg-dark justify-content-between align-items-center">
        <h1 class="headline-text">{{$product->title}}</h1>
        <div class="d-flex">
            <span id="package-{{$product->packages->first()->id}}" class="d-flex align-items-center fw-bold fs-4" style="font-weight: 600;font-size: 1.3rem;">{{number_format($product->price)}}₫</span>
           <!-- <a class="add-to-compare-link" href="#">So sánh</a> -->
            <a href="#" id="buynow" data-model="{{$product->code}}" class="btn btn-primary cta buy rounded-pill ms-3">Mua ngay</a>
        </div>
        </div>
    </div>
</div>
<div class="col-full">
    
    <div class="row">
        <!-- .woocommerce-breadcrumb -->
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="product product-type-simple">
                    <div class="single-product-wrapper">
                        <div class="product-images-wrapper thumb-count-4">
                            
                            <div id="techmarket-single-product-gallery"
                                class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images"
                                data-columns="4">
                                <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel"
                                    data-wrap=".woocommerce-product-gallery__wrapper"
                                    data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                        data-columns="4">
                                        <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                                        <figure class="woocommerce-product-gallery__wrapper ">
                                        @foreach (json_decode($product->json_data, true)['modelList'] as $model )
                                        
                                        @if ($model['modelCode'] == $product->code)
                                            @foreach($model['galleryImageLarge'] as $image)
                                            <div data-thumb="{{$image}}"
                                            class="woocommerce-product-gallery__image">
                                            <a href="{{$image}}" target="__blank" tabindex="0">
                                                <img width="600" height="600" src="{{$image}}"
                                                    class="attachment-shop_single size-shop_single wp-post-image"
                                                    alt="">
                                            </a>
                                        </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                        </figure>
                                    </div>
                                    <!-- .woocommerce-product-gallery -->
                                </div>
                                <!-- .techmarket-single-product-gallery-images -->
                                <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel"
                                    data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper"
                                    data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;horizontal&quot;:true,&quot;horizontalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;horizontal&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                    <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                                    @foreach (json_decode($product->json_data, true)['modelList'] as $model )
                                        
                                            @if ($model['modelCode'] == $product->code)
                                                @foreach($model['galleryImageLarge'] as $image)
                                                    <figure data-thumb="{{$image}}"
                                                        class="techmarket-wc-product-gallery__image">
                                                        <img width="100" height="100" src="{{$image}}"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="">
                                                    </figure>
                                                @endforeach
                                            @endif
                                    @endforeach
                                    </figure>
                                    <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                                </div>
                                <!-- .techmarket-single-product-gallery-thumbnails -->
                            </div>
                            <!-- .techmarket-single-product-gallery -->
                        </div>
                        <!-- .product-images-wrapper -->
                        <div class="summary entry-summary">
                        <h3 class="product-title">{{$product->title}}</h3>
                            <!--<p class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <span
                                            class="woocommerce-Price-currencySymbol"></span>{{number_format($product->price)}}</span>₫
                                </ins>
                            </p> -->
                            <!-- .single-product-header -->
                            <div class="single-product-meta">

                                <div class="cat-and-sku">
                                    <span class="sku_wrapper">
                                        <span class="sku">{{$product->code}}</span>
                                    </span>
                                </div>
                                @foreach (json_decode($product->packages->first()->options) as $option)
                                    @if($option->fmyChipType == "COLOR")
                                        <div class="d-flex align-items-center justify-content-start mt-2">
                                            @foreach($option->optionList as $color)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50">
                                                    <g transform="translate(-18.001 9)">
                                                        <rect width="40" height="40" transform="translate(18.001 -9)" fill="none">
                                                        </rect>
                                                        <path d="M18,0A18,18,0,1,1,0,18,18,18,0,0,1,18,0Z"
                                                            transform="translate(18.001 -9)" fill="{{$color->optionCode}}">
                                                        </path>
                                                        <path
                                                            d="M18,1A17,17,0,0,0,5.979,30.019,17,17,0,1,0,30.02,5.979,16.889,16.889,0,0,0,18,1m0-1A18,18,0,1,1,0,18,18,18,0,0,1,18,0Z"
                                                            transform="translate(18.001 -9)" fill="rgba(0,0,0,0.5)"></path>
                                                    </g>
                                                </svg>
                                            @endforeach
                                        </div>
                                    @else
                                        
                                    <div class="d-flex align-items-center justify-content-start mt-2">
                                                    @foreach($option->optionList as $other)
                                                    <span data-package="{{$product->packages->first()->id}}" data-name="{{$option->fmyChipType}}" data-value="{{$other->optionCode}}" class="border border-black rounded-pill option-chips getprice">{{$other->optionLocalName}}</span>
                                                    @endforeach 
                                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- .single-product-meta -->
                            <!--<div class="rating-and-sharing-wrapper">
                                <div class="woocommerce-product-rating">
                                    <div class="star-rating">
                                        <span style="width:100%">Rated
                                            <strong class="rating">5.00</strong> out of 5 based on
                                            <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span
                                            class="count">1</span> customer review)</a>
                                </div>
                            </div> -->
                            <!-- .rating-and-sharing-wrapper -->
                            <div class="woocommerce-product-details__short-description">
                                <ul>
                                    @foreach (json_decode($product->json_data, true)['modelList'][0]['marketingMessage'] as $item) 
                                       
                                            <li>{!! $item !!}</li>          
                                                                          @endforeach
                                </ul>
                            </div>
                            <!-- .woocommerce-product-details__short-description -->
                           
                            <!-- .product-actions-wrapper -->
                        </div>
                        <!-- .entry-summary -->
                        <div class="product-actions-wrapper">
                            <div class="product-actions">
                                <div class="spec">
                                <h3>Thông số kĩ thuật</h3>
                                <table id="spec-detail">
                                    <tbody>
                                @foreach (json_decode($product->spec, true)['modelList'][0]['spec']['specItems'] as $item)
                                    <tr><td class="text-center" style="font-weight: 500" colspan="2">{{$item['attrName']}}</td></tr>
                                    @if(is_array($item['attrs']) || is_object($item['attrs']))
                                        @foreach ($item['attrs'] as $subitem)
                                        <tr><td>{{$subitem['attrName']}}</td><td>{{$subitem['attrValue']}}</td></tr>
                                        @endforeach
                                    @endif
                                    
                                @endforeach
                                @if (isset(json_decode($product->spec, true)['modelList'][0]['spechighlight']))
                                    @foreach (json_decode($product->spec, true)['modelList'][0]['spechighlight'] as $item)
                                       
                                        <tr><td>{{$item['attributesName']}}</td><td>{{$item['specIconValue']}}</td></tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                    
                                <a href="#" class="show-table-full text-center">Xem thêm >></a>

                                </div>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .product-actions-wrapper -->
                    </div>
                    <!-- .tm-related-products-carousel -->
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        {!!$product->content!!}
                    </div>
                    <!-- .brands-carousel -->
                </div>
                <!-- .product -->
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- .row -->
</div>
<script>
    function appendVideoPlayer() {
        try {
            const videoContainer = document.querySelector('.video');
            if (!videoContainer) {
                console.error('Video container not found');
                return;
            }
            const videoData = JSON.parse(videoContainer.getAttribute('data-video-data'));
            if (!videoData) {
                console.error('Video data not found');
                return;
            }
            const videoElement = document.createElement('video');
            videoElement.classList.add('video-player');
            videoElement.setAttribute('playsinline', '');
            videoElement.setAttribute('loop', '');
            videoElement.setAttribute('preload', 'auto');
            videoElement.setAttribute('style', 'width: 100%; height: 100%;');
            const desktopSource = document.createElement('source');
            desktopSource.setAttribute('src', videoData.desktopSrc);
            desktopSource.setAttribute('type', 'video/mp4');
            videoElement.appendChild(desktopSource);
            const mobileSource = document.createElement('source');
            mobileSource.setAttribute('src', videoData.mobileSrc);
            mobileSource.setAttribute('type', 'video/mp4');
            videoElement.appendChild(mobileSource);
            videoElement.autoplay = videoData.autoplay;
            videoElement.muted = videoData.muted;
            videoElement.loop = videoData.loop;
            videoElement.controls = videoData.controls;
            const captionElement = document.createElement('p');
            captionElement.classList.add('hidden');
            captionElement.textContent = videoData.caption;
            videoElement.appendChild(captionElement);
            const figure = document.createElement('figure');
            figure.classList.add('video--played');
            figure.style.width = '100%';
            figure.style.height = '100%';
            figure.appendChild(videoElement);
            videoContainer.innerHTML = '';
            videoContainer.appendChild(figure);
        } catch (error) {
            console.error('Error appending video player:', error);
        }
    }
    document.addEventListener('DOMContentLoaded', () => {
        appendVideoPlayer();
    });
</script>
@endsection