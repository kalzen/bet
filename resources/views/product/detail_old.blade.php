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
<div class="aem-Grid aem-Grid--12 aem-Grid--default--12 ">
	<div class="pd-g-product-promotion-bar aem-GridColumn aem-GridColumn--default--12">
	</div>
	<div class="pd-g-usp-banner aem-GridColumn aem-GridColumn--default--12">
	</div>
	<div class="pd-g-header-navigation aem-GridColumn aem-GridColumn--default--12">
		<div class="us-epp-discount-keep" style="display: none;"></div>
		<div class="pd-header-navigation-keep">
			<div class="pd-header-navigation bg-black" id="anchorContainer" style="">
				<!-- /* mobile - menu toggle : pd-header-navigation__menu--open/pd-header-navigation__menu--close */-->
				<div class="pd-header-navigation__header pd-header-navigation__menu--close">
					<h1 class="pd-header-navigation__headline">
						<strong class="pd-header-navigation__headline-text">{{$product->title}}</strong>
					</h1>
					<div class="pd-header-navigation__menu-wrap">
						<button type="button" aria-label="prev"
							class="pd-header-navigation__btn pd-header-navigation__btn-prev">
							<svg class="icon" focusable="false">
								<use xlink:href="#previous-regular" href="#previous-regular"></use>
							</svg>
						</button>
						<div class="pd-header-navigation__menu-inner">
							<input type="hidden" name="featureAnchorListYn" id="featureAnchorListYn" value="N">
							<ul class="pd-header-navigation__menu">
								<li id="anchor_pd-g-feature-benefit" class="pd-header-navigation__menu-item" style="">
									<a href="#benefit" an-tr="pdd01_anchor nav-product detail-text-menu"
										an-ca="navigation" an-ac="secondary navi" an-la="secondary navi:features"
										aria-label="Tính Năng">Tính Năng<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg></a>
								</li>
								<li id="anchor_pd-g-feature-gallery-carousel-pim"
									class="pd-header-navigation__menu-item" style="display: none; margin-left: 0px;">
									<a href="#gallery" an-tr="pdd01_anchor nav-product detail-text-menu"
										an-ca="navigation" an-ac="secondary navi" an-la="secondary navi:gallery"
										aria-label="Hình Ảnh">Hình Ảnh<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg></a>
								</li>
								<li id="anchor_pd-g-product-specs" class="pd-header-navigation__menu-item" style="">
									<a href="#specs" an-tr="pdd01_anchor nav-product detail-text-menu"
										an-ca="navigation" an-ac="secondary navi" an-la="secondary navi:spec"
										aria-label="Thông Số Kỹ Thuật">Thông Số Kỹ Thuật<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg></a>
								</li>
								<li id="reviewWrap" class="pd-header-navigation__menu-item">
									<a href="#reviews" an-tr="pdd01_anchor nav-product detail-text-menu"
										an-ca="navigation" an-ac="secondary navi" an-la="secondary navi:review"
										aria-label="Đánh giá">Đánh giá<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg></a>
								</li>
								<li id="anchor_pd-g-product-support" class="pd-header-navigation__menu-item" style="">
									<a href="#support" an-tr="pdd01_anchor nav-product detail-text-menu"
										an-ca="navigation" an-ac="secondary navi" an-la="secondary navi:support"
										aria-label="Hỗ Trợ">Hỗ Trợ<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg></a>
								</li>
								<li id="anchor_pd-g-product-compare" class="pd-header-navigation__menu-item">
									<a href="#compare" an-tr="pdd01_anchor nav-product detail-text-menu"
										an-ca="navigation" an-ac="secondary navi" an-la="secondary navi:compare"
										aria-label="So Sánh">So Sánh<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg></a>
								</li>
								<!-- /* feature pd anchor-nav 에서만 사용 */-->
								<li class="pd-header-navigation__menu-item" id="anchorWtb"
									style="display: none; margin-left: 0px;">
									<a href="javascript:;" class="js-cta-buy" data-modelcode="SM-M156BDBUXXV"
										data-iacode="01010500" an-tr="pdd01_anchor nav-product detail-text-where to buy"
										an-ca="buy cta" an-ac="where to buy" an-la="where to buy"
										aria-label="Mua ở đâu">Mua ở đâu<svg class="icon">
											<use xlink:href="#done-bold" href="#done-bold"></use>
										</svg>
									</a>
								</li>
							</ul>
							<div class="pd-header-navigation__menu-bar"
								style="left: 280.031px; width: 54px; display: none;"></div>
						</div>
						<button type="button" aria-label="next"
							class="pd-header-navigation__btn pd-header-navigation__btn-next">
							<svg class="icon" focusable="false">
								<use xlink:href="#next-regular" href="#next-regular"></use>
							</svg>
						</button>
						<div class="pd-header-navigation__menu-epromoter-cta">
							<button class="cta cta--label cta--icon cta--icon-leading" an-ca="content click"
								an-ac="feature" an-la="floating chat:chat with an expert">
								Trò chuyện với chuyên gia
								<svg class="icon" focusable="false" aria-hidden="true">
									<use xlink:href="#message-regular" href="#message-regular"></use>
								</svg>
							</button>
						</div>
					</div>
				</div>
				<div class="pd-buying-price">
					<div class="pd-buying-price__wrap">
						<div class="pd-buying-price__new-price" data-promotionprice="{{$product->price}}">
							{{number_format($product->price)}}₫
						</div>
					</div>
					<!-- /* desktop - add to cart button */-->
					<div class="pd-buying-price__cta"><a class="cta cta--contained cta--emphasis anchorBtn" href="#"
							style="" data-pimsubtype="galaxy m" data-pvitype="mobile" data-pvisubtype="smartphone"
							data-modelrevenue="4690400" data-modelprice="4690400" data-modelqty="1"
							data-modelcurrency="vnd" data-modelcode="SM-M156BDBUXXV" data-modelname="SM-M156B/DSN"
							data-modeldisplay="Galaxy M15 5G" data-discountprice=""
							an-tr="pdd01_anchor nav-product detail-cta-buy page" an-ca="buy cta" an-ac="buy now"
							an-la="buy now">MUA NGAY</a></div>
				</div>
			</div>
			<div class="pd-header-navigation__dummy">
				<div class="pd-header-navigation__dummy-headline"></div>
				<div class="pd-header-navigation__dummy-menu"></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="product-detail-kv product-detail-kv--fixed">
				<div class="product-detail-kv__gallery-area" style="position: absolute;">
					<script type="text/javascript">
						var spinImageNewData = [];
					</script>
					<div class="pd-header-gallery non-title" id="pd-header-gallery">
						<div class="pd-header-gallery__item--swiper swiper-container basic-swiper swiper-container-initialized swiper-container-horizontal"
							data-an-la-in="gallery:image zoom in" data-an-la-out="gallery:image zoom out"
							style="min-height: 2px;">
							<div class="pd-info">
								<h2 class="pd-info__title">32 inch Màn Hình Thông Minh M8 M80D UHD</h2>
								<div class="pd-info__wishlist"></div>
							</div>
							<button type="button" data-role="none" class="pd-header-gallery__arrow swiper-button-prev"
								aria-label="Previous" role="button" aria-disabled="true"
								an-tr="header(pim)_gallery module-product detail-image-arrow" an-ca="indication"
								an-ac="carousel" an-la="carousel:arrow:left" style="opacity: 1;">
								<span class="hidden">Trước</span>
								<svg class="icon" focusable="false" viewBox="0 0 96 96">
									<path d="M60.715 12.694l3.457 3.612L31.058 48l33.114 31.694-3.457 3.612L23.828 48z">
									</path>
								</svg>
							</button>
							<div class="swiper-wrapper"
								style="transform: translate3d(-684px, 0px, 0px); transition-duration: 0ms;">
								@foreach ($product->images as $image)
									<div class="pd-header-gallery__item swiper-slide" style="width: 684px;">
										<div class="pd-header-gallery__item-wrap"
											an-tr="header(pim)_gallery module-product detail-cta-gallery" an-ca="gallery"
											an-ac="product gallery" an-la="gallery:image zoom in">
											<span class="blind">Click or tap to zoom in/out</span>
											<figure class="first-image">
												<picture>
													<source media="(max-width:767px)"
														srcset="{{ $image->url }}?$360_288_PNG$, {{ $image->url }}?$720_576_PNG$ 1.5x">
													<source media="(min-width:768px) and (max-width:1365px)"
														srcset="{{ $image->url }}?$365_292_PNG$, {{ $image->url }}?$730_584_PNG$ 1.5x">
													<source media="(min-width:1366px)"
														srcset="{{ $image->url }}?$650_519_PNG$, {{ $image->url }}?$1300_1038_PNG$ 1.5x">
													<img src="{{ $image->url }}?$650_519_PNG$" alt="{{ $image->title }}">
												</picture>
											</figure>
											<div class="zoom-image">
												<div class="image">
													<img class="image__main lazy-load-man responsive-img"
														data-desktop-src="{{ $image->url }}?$2052_1641_PNG$"
														data-mobile-src="{{ $image->url }}?$2160_1728_PNG$" alt=""
														data-src="{{ $image->url }}?$2052_1641_PNG$" draggable="false">
												</div>
												<!-- (2021.10.22 수정) Snakbar 추가 -->
												<p class="snackbar" aria-hidden="true">Nhấp hoặc chạm để thu nhỏ</p>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<button type="button" data-role="none" class="pd-header-gallery__arrow swiper-button-next"
								aria-label="Next" role="button" aria-disabled="false"
								an-tr="header(pim)_gallery module-product detail-image-arrow" an-ca="indication"
								an-ac="carousel" an-la="carousel:arrow:right" style="opacity: 1;">
								<span class="hidden">Tiếp theo</span>
								<svg class="icon" focusable="false" viewBox="0 0 96 96">
									<path
										d="M31.828 16.306l3.457-3.612L72.172 48 35.285 83.306l-3.457-3.612L64.941 48z">
									</path>
								</svg>
							</button>
							<a href="javascript:;" class="zoom-btn" style="left: 677.5px; top: 403px;"
								aria-hidden="true" tabindex="-1" draggable="false">
								<span class="hidden">Zoom in</span>
								<svg class="icon" focusable="false" aria-hidden="true">
									<use xlink:href="#zoom-in-regular" href="#zoom-in-regular"></use>
								</svg>
							</a>
							<div class="pd-header-gallery__control">
								<div class="pd-header-gallery__item-btn">
									<ul class="pd-header-gallery__item-tab-list" role="list">
										<li class="pd-header-gallery__item-tab-item" role="listitem">
											<button class="pd-header-gallery__item-tab-button plus"
												an-tr="header(pim)_gallery module-product detail-cta-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image zoom in">
												<svg class="icon" focusable="false" aria-hidden="true">
													<use xlink:href="#zoom-in-regular" href="#zoom-in-regular"></use>
												</svg>
											</button>
										</li>
										<li class="pd-header-gallery__item-tab-item" role="listitem">
											<button class="pd-header-gallery__item-tab-button minus"
												an-tr="header(pim)_gallery module-product detail-cta-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image zoom out">
												<svg class="icon" focusable="false" aria-hidden="true">
													<use xlink:href="#zoom-out-regular" href="#zoom-out-regular"></use>
												</svg>
											</button>
										</li>
									</ul>
									<div class="pd-header-gallery__item-panel pd-header-gallery__item-view">
										<a class="cta cta--label cta--black btn-gallery-ar"
											data-ar-href="//images.samsung.com/is/content/samsung/p6pim/vn/ls32dm801uexxv/gallery/vn-smart-m8-32m80d-ls32dm801uexxv-540991422"
											href="javascript:void(0)" title="AR"
											an-tr="header(pim)_gallery module-product detail-cta-gallery"
											an-ca="gallery" an-ac="product gallery" an-la="gallery:ar">AR</a>
									</div>
									<ul class="pd-header-gallery__item-panel pd-header-gallery__item-moving is-active"
										id="galleryMoving" role="list">
										<li class="pd-header-gallery__item-moving-item" role="listitem">
											<button class="pd-header-gallery__item-moving-button up"
												an-tr="header(pim)_gallery module-product detail-cta-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image zoom up">
												<span class="hidden">Move Thumbnail Image down</span>
												<svg class="icon" focusable="false" aria-hidden="true">
													<use xlink:href="#up-highest-bold" href="#up-highest-bold"></use>
												</svg>
											</button>
										</li>
										<li class="pd-header-gallery__item-moving-item" role="listitem">
											<button class="pd-header-gallery__item-moving-button down"
												an-tr="header(pim)_gallery module-product detail-cta-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image zoom down">
												<span class="hidden">Move Thumbnail Image up</span>
												<svg class="icon" focusable="false" aria-hidden="true">
													<use xlink:href="#up-highest-bold" href="#up-highest-bold"></use>
												</svg>
											</button>
										</li>
										<li class="pd-header-gallery__item-moving-item" role="listitem">
											<button class="pd-header-gallery__item-moving-button left"
												an-tr="header(pim)_gallery module-product detail-cta-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image zoom left">
												<span class="hidden">Move Thumbnail Image right</span>
												<svg class="icon" focusable="false" aria-hidden="true">
													<use xlink:href="#up-highest-bold" href="#up-highest-bold"></use>
												</svg>
											</button>
										</li>
										<li class="pd-header-gallery__item-moving-item" role="listitem">
											<button class="pd-header-gallery__item-moving-button right"
												an-tr="header(pim)_gallery module-product detail-cta-gallery"
												an-ca="gallery" an-ac="product gallery"
												an-la="gallery:image zoom right">
												<span class="hidden">Move Thumbnail Image left</span>
												<svg class="icon" focusable="false" aria-hidden="true">
													<use xlink:href="#up-highest-bold" href="#up-highest-bold"></use>
												</svg>
											</button>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="pd-header-gallery__thumbnail">
							<div class="pd-header-gallery__thumbnail-tab">
								<div class="tab" data-comp-name="tab">
									<ul class="tab__list" role="tablist">
										<li class="tab__item tab__item--active" role="presentation">
											<button class="tab__item-title" role="tab"
												an-tr="header(pim)_gallery module-product detail-tab-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image:tab"
												aria-selected="true">
												<span class="tab__item-text">Hình ảnh (<em class="num">{{$product->images->count()}}</em>)</span>
												<span class="tab__item-line"></span>
											</button>
										</li>
									</ul>
								</div>
							</div>
							<div class="pd-header-gallery__thumbnail-wrap pd-header-gallery__thumbnail-image is-active">
								<button type="button"
									class="swiper-button-prev pd-header-gallery__thumbnail-button swiper-button-disabled"
									an-tr="header(pim)_gallery module-product detail-arrow-indication"
									an-ca="indication" an-ac="carousel" an-la="carousel:arrow:left">
									<span class="hidden">Previous</span>
									<svg class="icon" focusable="false">
										<use xlink:href="#previous-bold" href="#previous-bold"></use>
									</svg>
								</button>
								<div class="pd-header-gallery__thumbnail-swiper swiper-container basic-swiper swiper-container-initialized swiper-container-horizontal"
									data-swiper-option="{
                	&quot;breakpoints&quot;: {
                		&quot;1&quot;: {
                		&quot;slidesPerView&quot;:3.346,
                		&quot;allowTouchMove&quot;: true
                		},
                		&quot;768&quot;: {
                		&quot;slidesPerView&quot;:6,
                		&quot;allowTouchMove&quot;: false
                		}
                	},
                	&quot;keepWrapper&quot;:true,
                	&quot;componentEl&quot;:&quot;.pd-header-gallery__thumbnail-image&quot;,
                	&quot;observer&quot;: true,
                	&quot;observeParents&quot;: true}" style="">
									<ul class="pd-header-gallery__thumbnail-list swiper-wrapper" role="list"
										style="transform: translate3d(0px, 0px, 0px);">
										@foreach ($product->images as $image )
										<li class="pd-header-gallery__thumbnail-item swiper-slide swiper-slide-active"
											role="listitem" aria-hidden="false" style="width: 102px;">
											<a href="javascript:void(0);" role="button"
												an-tr="header(pim)_gallery module-product detail-module-gallery"
												an-ca="gallery" an-ac="product gallery" an-la="gallery:image"
												tabindex="0">
												<div class="image image--main-loaded">
													<img class="image__main responsive-img image--loaded"
														data-desktop-src="{{$image->url}}?$86_56_PNG$"
														data-mobile-src="{{$image->url}}?$82_53_PNG$"
														alt=""
														role="img" data-comp-name="image"
														src="{{$image->url}}?$86_56_PNG$"
														style="">
												</div>
											</a>
										</li>
										@endforeach
									</ul>
								</div>
								<button type="button" class="swiper-button-next pd-header-gallery__thumbnail-button"
									an-tr="header(pim)_gallery module-product detail-arrow-indication"
									an-ca="indication" an-ac="carousel" an-la="carousel:arrow:right">
									<span class="hidden">Next</span>
									<svg class="icon" focusable="false">
										<use xlink:href="#next-bold" href="#next-bold"></use>
									</svg>
								</button>
							</div>
							<div class="pd-header-gallery__thumbnail-wrap pd-header-gallery__thumbnail-video">
								<button type="button" class="swiper-button-prev pd-header-gallery__thumbnail-button"
									an-tr="header(pim)_gallery module-product detail-arrow-indication"
									an-ca="indication" an-ac="carousel" an-la="carousel:arrow:left" tabindex="-1"
									aria-disabled="true" style="display: none;">
									<span class="hidden">Previous</span>
									<svg class="icon" focusable="false">
										<use xlink:href="#previous-bold" href="#previous-bold"></use>
									</svg>
								</button>
								<div class="pd-header-gallery__thumbnail-swiper swiper-container basic-swiper"
									data-swiper-option="{
		              &quot;breakpoints&quot;: {
		                &quot;1&quot;: {
		                  &quot;slidesPerView&quot;:3.346,
		                  &quot;allowTouchMove&quot;: true
		                },
		                &quot;768&quot;: {
		                  &quot;slidesPerView&quot;:6,
		                  &quot;allowTouchMove&quot;: false
		                }
		              },
		              &quot;keepWrapper&quot;:true,
		              &quot;componentEl&quot;:&quot;.pd-header-gallery__thumbnail-video&quot;,
		              &quot;observer&quot;: true,
		              &quot;observeParents&quot;: true}">
								</div>
								<button type="button" class="swiper-button-next pd-header-gallery__thumbnail-button"
									an-tr="header(pim)_gallery module-product detail-arrow-indication"
									an-ca="indication" an-ac="carousel" an-la="carousel:arrow:right" tabindex="-1"
									aria-disabled="true" style="display: none;">
									<span class="hidden">Next</span>
									<svg class="icon" focusable="false">
										<use xlink:href="#next-bold" href="#next-bold"></use>
									</svg>
								</button>
							</div>
						</div>
						<div class="pd-header-gallery__layer-popup type-ar">
							<div class="ar-popup-inner">
								<a href="javascript:void(0);" class="popup-close"><span class="hidden">đóng cửa sổ
										Popup</span>
									<svg class="icon" focusable="false" viewBox="0 0 96 96">
										<path
											d="M80.233 12.232l3.535 3.536-32.232 32.231 32.23 32.231-3.535 3.536L48 51.535 15.768 83.768l-3.535-3.536 32.232-32.233-32.233-32.231 3.535-3.536L48 44.464z">
										</path>
									</svg>
								</a>
								<strong class="ar-popup-title">Xem Ở Chế Độ Thực Tế Ảo </strong>
								<p class="ar-popup-text">Vui lòng sử dụng thiết bị di động để quét mã QR, sau đó đặt
									hình ảnh sản phẩm vào khu vực không gian bạn mong muốn. </p>
								<div class="qr-code"><svg viewBox="0 0 49 49" width="256" height="256" fill="#000"
										shape-rendering="crispEdges" xmlns="http://www.w3.org/2000/svg" version="1.1">
										<path transform="matrix(1,0,0,1,4,4)"
											d="M34,40h5v1h-5v-1zM29,40h3v1h-3v-1zM25,40h2v1h-2v-1zM22,40h1v1h-1v-1zM18,40h2v1h-2v-1zM16,40h1v1h-1v-1zM12,40h3v1h-3v-1zM10,40h1v1h-1v-1zM8,40h1v1h-1v-1zM0,40h7v1h-7v-1zM39,39h1v1h-1v-1zM36,39h1v1h-1v-1zM34,39h1v1h-1v-1zM31,39h2v1h-2v-1zM26,39h3v1h-3v-1zM20,39h5v1h-5v-1zM18,39h1v1h-1v-1zM12,39h4v1h-4v-1zM6,39h1v1h-1v-1zM0,39h1v1h-1v-1zM33,38h6v1h-6v-1zM27,38h3v1h-3v-1zM25,38h1v1h-1v-1zM20,38h1v1h-1v-1zM16,38h1v1h-1v-1zM10,38h5v1h-5v-1zM8,38h1v1h-1v-1zM6,38h1v1h-1v-1zM2,38h3v1h-3v-1zM0,38h1v1h-1v-1zM39,37h2v1h-2v-1zM35,37h1v1h-1v-1zM30,37h4v1h-4v-1zM28,37h1v1h-1v-1zM26,37h1v1h-1v-1zM18,37h6v1h-6v-1zM15,37h1v1h-1v-1zM12,37h2v1h-2v-1zM8,37h2v1h-2v-1zM6,37h1v1h-1v-1zM2,37h3v1h-3v-1zM0,37h1v1h-1v-1zM40,36h1v1h-1v-1zM38,36h1v1h-1v-1zM32,36h5v1h-5v-1zM29,36h1v1h-1v-1zM27,36h1v1h-1v-1zM24,36h2v1h-2v-1zM21,36h1v1h-1v-1zM11,36h4v1h-4v-1zM8,36h2v1h-2v-1zM6,36h1v1h-1v-1zM2,36h3v1h-3v-1zM0,36h1v1h-1v-1zM39,35h2v1h-2v-1zM36,35h2v1h-2v-1zM32,35h1v1h-1v-1zM26,35h1v1h-1v-1zM24,35h1v1h-1v-1zM14,35h9v1h-9v-1zM12,35h1v1h-1v-1zM8,35h1v1h-1v-1zM6,35h1v1h-1v-1zM0,35h1v1h-1v-1zM39,34h1v1h-1v-1zM36,34h2v1h-2v-1zM34,34h1v1h-1v-1zM31,34h2v1h-2v-1zM25,34h4v1h-4v-1zM21,34h1v1h-1v-1zM14,34h4v1h-4v-1zM10,34h3v1h-3v-1zM0,34h7v1h-7v-1zM36,33h5v1h-5v-1zM30,33h3v1h-3v-1zM28,33h1v1h-1v-1zM25,33h1v1h-1v-1zM21,33h3v1h-3v-1zM19,33h1v1h-1v-1zM17,33h1v1h-1v-1zM13,33h2v1h-2v-1zM8,33h2v1h-2v-1zM38,32h1v1h-1v-1zM31,32h6v1h-6v-1zM29,32h1v1h-1v-1zM25,32h3v1h-3v-1zM22,32h2v1h-2v-1zM19,32h1v1h-1v-1zM17,32h1v1h-1v-1zM15,32h1v1h-1v-1zM12,32h1v1h-1v-1zM10,32h1v1h-1v-1zM5,32h4v1h-4v-1zM2,32h1v1h-1v-1zM0,32h1v1h-1v-1zM39,31h1v1h-1v-1zM37,31h1v1h-1v-1zM32,31h4v1h-4v-1zM30,31h1v1h-1v-1zM26,31h3v1h-3v-1zM23,31h1v1h-1v-1zM18,31h4v1h-4v-1zM13,31h2v1h-2v-1zM10,31h1v1h-1v-1zM8,31h1v1h-1v-1zM2,31h2v1h-2v-1zM0,31h1v1h-1v-1zM37,30h2v1h-2v-1zM32,30h3v1h-3v-1zM26,30h4v1h-4v-1zM21,30h2v1h-2v-1zM18,30h2v1h-2v-1zM14,30h1v1h-1v-1zM4,30h9v1h-9v-1zM2,30h1v1h-1v-1zM0,30h1v1h-1v-1zM33,29h8v1h-8v-1zM28,29h4v1h-4v-1zM25,29h2v1h-2v-1zM23,29h1v1h-1v-1zM20,29h2v1h-2v-1zM16,29h1v1h-1v-1zM8,29h4v1h-4v-1zM0,29h6v1h-6v-1zM37,28h3v1h-3v-1zM31,28h2v1h-2v-1zM28,28h2v1h-2v-1zM24,28h3v1h-3v-1zM19,28h1v1h-1v-1zM17,28h1v1h-1v-1zM14,28h2v1h-2v-1zM11,28h1v1h-1v-1zM8,28h2v1h-2v-1zM5,28h2v1h-2v-1zM2,28h2v1h-2v-1zM0,28h1v1h-1v-1zM40,27h1v1h-1v-1zM37,27h1v1h-1v-1zM35,27h1v1h-1v-1zM31,27h3v1h-3v-1zM28,27h1v1h-1v-1zM26,27h1v1h-1v-1zM19,27h3v1h-3v-1zM13,27h2v1h-2v-1zM11,27h1v1h-1v-1zM7,27h1v1h-1v-1zM4,27h1v1h-1v-1zM2,27h1v1h-1v-1zM39,26h1v1h-1v-1zM35,26h2v1h-2v-1zM32,26h1v1h-1v-1zM29,26h2v1h-2v-1zM25,26h3v1h-3v-1zM20,26h3v1h-3v-1zM18,26h1v1h-1v-1zM15,26h2v1h-2v-1zM9,26h2v1h-2v-1zM5,26h3v1h-3v-1zM2,26h1v1h-1v-1zM0,26h1v1h-1v-1zM39,25h2v1h-2v-1zM36,25h2v1h-2v-1zM34,25h1v1h-1v-1zM31,25h1v1h-1v-1zM28,25h1v1h-1v-1zM25,25h2v1h-2v-1zM23,25h1v1h-1v-1zM16,25h6v1h-6v-1zM13,25h2v1h-2v-1zM11,25h1v1h-1v-1zM7,25h1v1h-1v-1zM1,25h3v1h-3v-1zM37,24h3v1h-3v-1zM35,24h1v1h-1v-1zM33,24h1v1h-1v-1zM22,24h8v1h-8v-1zM19,24h1v1h-1v-1zM17,24h1v1h-1v-1zM15,24h1v1h-1v-1zM13,24h1v1h-1v-1zM9,24h2v1h-2v-1zM3,24h5v1h-5v-1zM40,23h1v1h-1v-1zM36,23h2v1h-2v-1zM31,23h1v1h-1v-1zM26,23h2v1h-2v-1zM20,23h2v1h-2v-1zM18,23h1v1h-1v-1zM12,23h4v1h-4v-1zM7,23h1v1h-1v-1zM5,23h1v1h-1v-1zM3,23h1v1h-1v-1zM0,23h2v1h-2v-1zM34,22h2v1h-2v-1zM26,22h4v1h-4v-1zM22,22h1v1h-1v-1zM20,22h1v1h-1v-1zM17,22h1v1h-1v-1zM11,22h1v1h-1v-1zM6,22h3v1h-3v-1zM0,22h3v1h-3v-1zM36,21h5v1h-5v-1zM31,21h4v1h-4v-1zM28,21h1v1h-1v-1zM25,21h1v1h-1v-1zM23,21h1v1h-1v-1zM19,21h2v1h-2v-1zM14,21h3v1h-3v-1zM11,21h2v1h-2v-1zM4,21h2v1h-2v-1zM1,21h1v1h-1v-1zM40,20h1v1h-1v-1zM38,20h1v1h-1v-1zM35,20h1v1h-1v-1zM32,20h1v1h-1v-1zM28,20h2v1h-2v-1zM24,20h2v1h-2v-1zM21,20h2v1h-2v-1zM18,20h2v1h-2v-1zM12,20h2v1h-2v-1zM6,20h1v1h-1v-1zM0,20h4v1h-4v-1zM40,19h1v1h-1v-1zM36,19h1v1h-1v-1zM33,19h1v1h-1v-1zM31,19h1v1h-1v-1zM27,19h1v1h-1v-1zM23,19h2v1h-2v-1zM20,19h1v1h-1v-1zM16,19h1v1h-1v-1zM12,19h2v1h-2v-1zM10,19h1v1h-1v-1zM3,19h1v1h-1v-1zM0,19h2v1h-2v-1zM38,18h1v1h-1v-1zM36,18h1v1h-1v-1zM30,18h1v1h-1v-1zM24,18h4v1h-4v-1zM22,18h1v1h-1v-1zM20,18h1v1h-1v-1zM18,18h1v1h-1v-1zM15,18h1v1h-1v-1zM9,18h2v1h-2v-1zM3,18h5v1h-5v-1zM1,18h1v1h-1v-1zM39,17h2v1h-2v-1zM34,17h3v1h-3v-1zM30,17h2v1h-2v-1zM22,17h2v1h-2v-1zM19,17h2v1h-2v-1zM15,17h2v1h-2v-1zM12,17h1v1h-1v-1zM7,17h4v1h-4v-1zM2,17h3v1h-3v-1zM0,17h1v1h-1v-1zM40,16h1v1h-1v-1zM38,16h1v1h-1v-1zM35,16h1v1h-1v-1zM33,16h1v1h-1v-1zM31,16h1v1h-1v-1zM29,16h1v1h-1v-1zM25,16h2v1h-2v-1zM22,16h1v1h-1v-1zM15,16h3v1h-3v-1zM12,16h2v1h-2v-1zM9,16h2v1h-2v-1zM6,16h1v1h-1v-1zM1,16h1v1h-1v-1zM40,15h1v1h-1v-1zM37,15h1v1h-1v-1zM34,15h1v1h-1v-1zM26,15h2v1h-2v-1zM24,15h1v1h-1v-1zM21,15h2v1h-2v-1zM18,15h1v1h-1v-1zM15,15h2v1h-2v-1zM12,15h1v1h-1v-1zM7,15h2v1h-2v-1zM1,15h4v1h-4v-1zM35,14h3v1h-3v-1zM33,14h1v1h-1v-1zM30,14h1v1h-1v-1zM27,14h1v1h-1v-1zM25,14h1v1h-1v-1zM20,14h3v1h-3v-1zM18,14h1v1h-1v-1zM15,14h1v1h-1v-1zM6,14h5v1h-5v-1zM4,14h1v1h-1v-1zM0,14h2v1h-2v-1zM40,13h1v1h-1v-1zM33,13h6v1h-6v-1zM31,13h1v1h-1v-1zM28,13h2v1h-2v-1zM22,13h2v1h-2v-1zM18,13h1v1h-1v-1zM15,13h1v1h-1v-1zM12,13h1v1h-1v-1zM9,13h1v1h-1v-1zM7,13h1v1h-1v-1zM5,13h1v1h-1v-1zM0,13h4v1h-4v-1zM40,12h1v1h-1v-1zM37,12h2v1h-2v-1zM35,12h1v1h-1v-1zM31,12h2v1h-2v-1zM27,12h3v1h-3v-1zM25,12h1v1h-1v-1zM22,12h2v1h-2v-1zM19,12h2v1h-2v-1zM17,12h1v1h-1v-1zM15,12h1v1h-1v-1zM11,12h3v1h-3v-1zM9,12h1v1h-1v-1zM6,12h2v1h-2v-1zM4,12h1v1h-1v-1zM0,12h1v1h-1v-1zM37,11h1v1h-1v-1zM31,11h4v1h-4v-1zM23,11h1v1h-1v-1zM20,11h2v1h-2v-1zM18,11h1v1h-1v-1zM15,11h2v1h-2v-1zM13,11h1v1h-1v-1zM7,11h2v1h-2v-1zM4,11h2v1h-2v-1zM2,11h1v1h-1v-1zM0,11h1v1h-1v-1zM36,10h1v1h-1v-1zM32,10h2v1h-2v-1zM26,10h4v1h-4v-1zM24,10h1v1h-1v-1zM20,10h1v1h-1v-1zM17,10h1v1h-1v-1zM15,10h1v1h-1v-1zM13,10h1v1h-1v-1zM10,10h1v1h-1v-1zM5,10h2v1h-2v-1zM2,10h1v1h-1v-1zM38,9h3v1h-3v-1zM36,9h1v1h-1v-1zM31,9h4v1h-4v-1zM28,9h2v1h-2v-1zM23,9h1v1h-1v-1zM21,9h1v1h-1v-1zM19,9h1v1h-1v-1zM17,9h1v1h-1v-1zM14,9h2v1h-2v-1zM11,9h2v1h-2v-1zM7,9h3v1h-3v-1zM4,9h1v1h-1v-1zM0,9h1v1h-1v-1zM34,8h5v1h-5v-1zM32,8h1v1h-1v-1zM29,8h1v1h-1v-1zM24,8h4v1h-4v-1zM19,8h1v1h-1v-1zM12,8h6v1h-6v-1zM2,8h5v1h-5v-1zM0,8h1v1h-1v-1zM31,7h1v1h-1v-1zM26,7h1v1h-1v-1zM24,7h1v1h-1v-1zM19,7h4v1h-4v-1zM15,7h1v1h-1v-1zM10,7h1v1h-1v-1zM8,7h1v1h-1v-1zM34,6h7v1h-7v-1zM32,6h1v1h-1v-1zM30,6h1v1h-1v-1zM28,6h1v1h-1v-1zM26,6h1v1h-1v-1zM24,6h1v1h-1v-1zM22,6h1v1h-1v-1zM20,6h1v1h-1v-1zM18,6h1v1h-1v-1zM16,6h1v1h-1v-1zM14,6h1v1h-1v-1zM12,6h1v1h-1v-1zM10,6h1v1h-1v-1zM8,6h1v1h-1v-1zM0,6h7v1h-7v-1zM40,5h1v1h-1v-1zM34,5h1v1h-1v-1zM32,5h1v1h-1v-1zM29,5h1v1h-1v-1zM27,5h1v1h-1v-1zM22,5h1v1h-1v-1zM20,5h1v1h-1v-1zM17,5h1v1h-1v-1zM14,5h1v1h-1v-1zM12,5h1v1h-1v-1zM10,5h1v1h-1v-1zM8,5h1v1h-1v-1zM6,5h1v1h-1v-1zM0,5h1v1h-1v-1zM40,4h1v1h-1v-1zM36,4h3v1h-3v-1zM34,4h1v1h-1v-1zM31,4h1v1h-1v-1zM28,4h1v1h-1v-1zM26,4h1v1h-1v-1zM23,4h1v1h-1v-1zM16,4h6v1h-6v-1zM10,4h3v1h-3v-1zM8,4h1v1h-1v-1zM6,4h1v1h-1v-1zM2,4h3v1h-3v-1zM0,4h1v1h-1v-1zM40,3h1v1h-1v-1zM36,3h3v1h-3v-1zM34,3h1v1h-1v-1zM28,3h4v1h-4v-1zM25,3h2v1h-2v-1zM21,3h1v1h-1v-1zM16,3h1v1h-1v-1zM11,3h2v1h-2v-1zM8,3h1v1h-1v-1zM6,3h1v1h-1v-1zM2,3h3v1h-3v-1zM0,3h1v1h-1v-1zM40,2h1v1h-1v-1zM36,2h3v1h-3v-1zM34,2h1v1h-1v-1zM32,2h1v1h-1v-1zM30,2h1v1h-1v-1zM27,2h2v1h-2v-1zM21,2h1v1h-1v-1zM17,2h2v1h-2v-1zM13,2h3v1h-3v-1zM10,2h1v1h-1v-1zM8,2h1v1h-1v-1zM6,2h1v1h-1v-1zM2,2h3v1h-3v-1zM0,2h1v1h-1v-1zM40,1h1v1h-1v-1zM34,1h1v1h-1v-1zM32,1h1v1h-1v-1zM30,1h1v1h-1v-1zM27,1h2v1h-2v-1zM24,1h1v1h-1v-1zM20,1h1v1h-1v-1zM17,1h1v1h-1v-1zM9,1h1v1h-1v-1zM6,1h1v1h-1v-1zM0,1h1v1h-1v-1zM34,0h7v1h-7v-1zM30,0h3v1h-3v-1zM28,0h1v1h-1v-1zM23,0h4v1h-4v-1zM19,0h3v1h-3v-1zM17,0h1v1h-1v-1zM14,0h2v1h-2v-1zM9,0h3v1h-3v-1zM0,0h7v1h-7v-1z">
										</path>
									</svg></div>
							</div>
						</div>
						<div class="pd-header-gallery__layer-dimmed"></div>
						
					</div>
				</div>
				<div class="product-detail-kv__cta-epromotor">
					<button class="cta cta--label cta--black cta--icon cta--icon-leading" an-ca="content click"
						an-ac="feature" an-la="floating chat:chat with an expert">
						Trò chuyện với chuyên gia
						<svg class="icon" focusable="false" aria-hidden="true">
							<use xlink:href="#message-regular" href="#message-regular"></use>
						</svg>
					</button>
				</div>
				<div class="product-detail-kv__buying-tool">
					<section class="pd-buying-tool" style="min-height: 749px;">
						<div class="pd-buying-tool__info">
							<div class="pd-info">
								<h2 class="pd-info__title">{{$product->title}}</h2>
								<p class="pd-info__sku">
									<span class="pd-info__sku-code">{{$product->code}}
									</span>
								</p>
							</div>
						</div>
						<div class="pd-buying-tool__option">
							<div class="pd-select-option trade-in off-change has-component" style="">
								
								
							</div>
							{!!$product->package!!}
							<div class="pd-select-option option-device off-scroll off-change bundle-group"
								id="option-device">
								<h3 class="pd-select-option__headline">Chọn Thiết bị</h3>
								<div class="pd-select-option__wrap">
									<ul class="pd-select-option__list" role="list">
										<li class="pd-select-option__item" role="listitem">
											<div class="pd-option-selector">
												<input class="hidden option-input add-special-tagging " type="radio"
													name="pd-capacity2" id="pd-capacity2-0"
													an-tr="header(pim)_option selector-product detail-select-option"
													an-ca="option click" an-ac="pd buying tool"
													an-la="thiết bị:32 4k smart monitor m8 m80c color"
													data-modelcode="LS32CM801UEXXV" data-familycode="454772"
													data-originpdpurl="/vn/monitors/high-resolution/smart-m8-m80c-32-inch-uhd-4k-smart-tv-apps-ls32cm801uexxv/"
													data-pvitype="monitor" data-pvisubtype="led monitor"
													data-pimsubtype="smart" data-modelqty="1">
												<label class="pd-option-selector__label" for="pd-capacity2-0">
													<span class="pd-option-selector__text-wrap"
														style="height: 59.1719px;">
														<span class="pd-option-selector__text">
															<strong class="pd-option-selector__main-text">32 Inch Màn
																Hình Thông Minh M8 M80C UHD</strong>
														</span>
													</span>
												</label>
											</div>
										</li>
										<li class="pd-select-option__item" role="listitem">
											<div class="pd-option-selector">
												<input class="hidden option-input add-special-tagging checked"
													type="radio" name="pd-capacity2" id="pd-capacity2-1"
													an-tr="header(pim)_option selector-product detail-select-option"
													an-ca="option click" an-ac="pd buying tool"
													an-la="thiết bị:32 smart monitor m8 m80d uhd"
													data-modelcode="LS32DM801UEXXV" checked="checked"
													data-modelname="s32dm801ue" data-modelprice="16389000"
													data-modelrevenue="16389000" data-discountprice="16389000"
													data-modeldisplay="32 inch màn hình thông minh m8 m80d uhd"
													data-pvitype="monitor" data-pvisubtype="led monitor"
													data-pimsubtype="smart" data-modelqty="1">
												<label class="pd-option-selector__label" for="pd-capacity2-1">
													<span class="pd-option-selector__text-wrap"
														style="height: 59.1719px;">
														<span class="pd-option-selector__text">
															<strong class="pd-option-selector__main-text">32 Inch Màn
																Hình Thông Minh M8 M80D UHD</strong>
															<span class="pd-option-selector__sub-text">Giá từ
																16.389.000&nbsp;₫</span>
														</span>
													</span>
												</label>
											</div>
										</li>
									</ul>
									<p class="pd-select-option__alert-message">
										<svg class="icon" focusable="false" viewBox="0 0 96 96">
											<path
												d="M48 2.5c25.089 0 45.5 20.412 45.5 45.502C93.5 73.09 73.089 93.5 48 93.5S2.5 73.09 2.5 48.002C2.5 22.912 22.911 2.5 48 2.5zM51 40H39.542v6H45v30h6V40zm-4.002-21l-.217.005A5.005 5.005 0 0042 24a5.006 5.006 0 004.781 4.996l.217.005.217-.005a5.009 5.009 0 004.78-4.774l.005-.223-.005-.216a5.008 5.008 0 00-4.774-4.778L46.998 19z">
											</path>
										</svg>
										<span class="pd-select-option__alert-span-text"></span>
									</p>
								</div>
							</div>
							<div class="pd-select-option off-scroll off-change option-color bundle-group"
								id="option-color">
								<h3 class="pd-select-option__headline">Chọn Màu Sắc</h3>
								<div class="pd-select-option__wrap">
									<div class="pd-select-option__color-name">Màu sắc : <span
											id="multiColorText">Trắng</span></div>
									<ul class="pd-select-option__list pd-select-option__list--color-chip" role="list">
										<li class="pd-select-option__item" role="listitem">
											<div class="pd-option-selector">
												<input
													class="hidden option-input add-special-tagging buyingoption-api checked"
													type="radio" name="pd-color" id="pd-color-0"
													an-tr="header(pim)_option selector-product detail-select-option"
													an-ca="option click" an-ac="pd buying tool" an-la="color:white"
													data-colorname="Trắng" data-modelcode="LS32DM801UEXXV"
													checked="checked" data-modelname="s32dm801ue"
													data-modelprice="16389000" data-modelrevenue="16389000"
													data-discountprice="16389000"
													data-modeldisplay="32 inch màn hình thông minh m8 m80d uhd"
													data-pvitype="monitor" data-pvisubtype="led monitor"
													data-pimsubtype="smart" data-modelqty="1">
												<label class="pd-option-selector__label" for="pd-color-0">
													<span class="pd-option-selector__color" style="background:#ffffff;">
														<span class="hidden"></span>
													</span>
												</label>
												<input id="galleryValueName__" type="hidden" value="#ffffff">
											</div>
										</li>
									</ul>
								</div>
								<div class="pd-select-option__eta-text" style="display:none;">
									<svg class="icon">
										<use xlink:href="#in-stock-regular" href="#in-stock-regular"></use>
									</svg>
									<span></span>
								</div>
							</div>
							<div class="pd-select-option off-scroll off-change option-others bundle-group"
								id="option-others-VD018">
								<h3 class="pd-select-option__headline">Chọn size</h3>
								<div class="pd-select-option__wrap">
									<ul class="pd-select-option__list " role="list">
										<li class="pd-select-option__item" role="listitem">
											<div class="pd-option-selector">
												<input
													class="hidden option-input add-special-tagging buyingoption-api checked"
													type="radio" name="pd-others-VD018" id="pd-others-0-VD018"
													an-tr="header(pim)_option selector-product detail-select-option"
													an-ca="option click" an-ac="pd buying tool" an-la="size:32"
													data-modelcode="LS32DM801UEXXV" checked="checked"
													data-modelname="s32dm801ue" data-modelprice="16389000"
													data-modelrevenue="16389000" data-discountprice="16389000"
													data-modeldisplay="32 inch màn hình thông minh m8 m80d uhd"
													data-pvitype="monitor" data-pvisubtype="led monitor"
													data-pimsubtype="smart" data-modelqty="1">
												<label class="pd-option-selector__label" for="pd-others-0-VD018">
													<span class="pd-option-selector__text-wrap">
														<span class="pd-option-selector__text">
															<strong class="pd-option-selector__main-text">32
																inch</strong>
															<span class="pd-option-selector__sub-text"></span>
														</span>
													</span>
												</label>
											</div>
										</li>
									</ul>
									<p class="pd-select-option__alert-message">
										<svg class="icon" focusable="false" viewBox="0 0 96 96">
											<path
												d="M48 2.5c25.089 0 45.5 20.412 45.5 45.502C93.5 73.09 73.089 93.5 48 93.5S2.5 73.09 2.5 48.002C2.5 22.912 22.911 2.5 48 2.5zM51 40H39.542v6H45v30h6V40zm-4.002-21l-.217.005A5.005 5.005 0 0042 24a5.006 5.006 0 004.781 4.996l.217.005.217-.005a5.009 5.009 0 004.78-4.774l.005-.223-.005-.216a5.008 5.008 0 00-4.774-4.778L46.998 19z">
											</path>
										</svg>
										<span class="pd-select-option__alert-span-text"></span>
									</p>
								</div>
							</div>
							<div class="pd-select-option option-bezelcolor bundle-group" id="option-bezelcolor"
								style="display: none;"></div>
							<div class="pd-select-option option-between" style="display: none;">
								<div class="pd-select-option__headline-wrap">
									<h3 class="pd-select-option__headline">Chọn trong khoảng</h3>
								</div>
								<div class="pd-select-option__wrap"></div>
							</div>
							<div class="pd-select-option pd-select-option--delivery-detail" style="display: none;">
							</div>
							<div class="option-result result-delivery" style="display: none;">
								<div class="option-result__text-wrap">
								</div>
								<div class="option-result__desc-wrap">
									<p class="option-result__desc"></p>
								</div>
								<a href="javascript:void(0);" class="option-result__close remove-delivery"
									an-tr="header(pim)_option selector-product detail-image-submit" an-ca="option click"
									an-ac="pd buying tool" an-la="zip code:delete"><span class="hidden">Đóng</span>
									<svg class="icon" focusable="false" viewBox="0 0 96 96">
										<path
											d="M79.17 11.17L48 42.34 16.83 11.17l-5.66 5.66L42.34 48 11.17 79.17l5.66 5.66L48 53.66l31.17 31.17 5.66-5.66L53.66 48l31.17-31.17z">
										</path>
									</svg>
								</a>
							</div>
							<div class="pd-select-option off-change option-tariff" style="display: none;"></div>
							<div class="option-result result-tariff-optioin" style="display: none;"></div>
							<div class="pd-select-option option-offer-finance" style="display: none;"></div>
							<div class="pd-select-option off-change option-new-assured-buy-back" style="display: none;">
							</div>
							<div class="option-result-dev result-option-new-assured-buy-back" style="display: none;">
								<input type="hidden" class="hidden result-price">
							</div>
							<div class="pd-select-option off-change option-care" style="display: none;"></div>
							<div class="option-result-dev result-care" style="display: none;">
								<input type="hidden" class="hidden result-price">
							</div>
							<div class="pd-select-option off-change option-warranty" style="display: none;"></div>
							<div class="option-result result-warranty" style="display: none;">
								<div class="option-result__text-wrap result-price">
								</div>
								<a href="javascript:void(0);" class="option-result__close remove-warranty-result"><span
										class="hidden">Đóng</span>
									<svg class="icon" focusable="false" viewBox="0 0 96 96">
										<path
											d="M79.17 11.17L48 42.34 16.83 11.17l-5.66 5.66L42.34 48 11.17 79.17l5.66 5.66L48 53.66l31.17 31.17 5.66-5.66L53.66 48l31.17-31.17z">
										</path>
									</svg>
								</a>
							</div>
							<div class="pd-select-option off-change option-warranty-vd" style="display: none;"></div>
							<div class="option-result option-result--extended-warranty-option" style="display: none;">
							</div>
							<div class="pd-select-option option-embed-addon" style="display: none;"></div>
							<div class="pd-select-option pd-select-option--type-offer option-offer has-component"
								style="">
								<h3 class="pd-select-option__headline">Ưu đãi</h3>
								<div class="pd-offer">
									<ul class="pd-offer__list">
										<li class="pd-offer__item has-component promoMessage">
											<div
												class="pd-offer__content pd-offer__content--data offer-promotion promotion-index-0">
												<div class="pd-offer__desc">
													<div class="wrapper">
														<div class="image">
															<p><img src="https://images.samsung.com/vn/smartphones/galaxy-s24/buy/offer_trade_in_blue.png"
																	style="border-style:solid; border-width:0px; float:left; margin-right:10px; width:75px">
															</p>
														</div>
														<div class="text">
															<p><big>Thu cũ đổi mới</big><br>Lên đời<strong> Màn hình
																	Samsung 2024</strong> , rước ngay siêu ưu đãi đến
																<strong>10%</strong><br><a target="_blank"
																	href="http://www.samsung.com/ph/offer/online/2022/galaxy-tab-s8/pre-order/">Tìm
																	hiểu thêm</a>
															</p>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="pd-select-option off-change option-upgrade pd-select-option--upgrade-program"
								style="display: none;"></div>
							<div class="option-result result-upgrade" style="display: none;">
								<div class="option-result__text-wrap result-price">
								</div>
								<a href="javascript:void(0);" class="option-result__close remove-upgrade-result"><span
										class="hidden">Đóng</span>
									<svg class="icon" focusable="false" viewBox="0 0 96 96">
										<path
											d="M79.17 11.17L48 42.34 16.83 11.17l-5.66 5.66L42.34 48 11.17 79.17l5.66 5.66L48 53.66l31.17 31.17 5.66-5.66L53.66 48l31.17-31.17z">
										</path>
									</svg>
								</a>
							</div>
							<div class="pd-select-option off-change option-galaxy-forever" style="display: none;"></div>
							<div class="option-result result-galaxy-forever" style="display: none;">
								<div class="option-result__text-wrap result-price">
								</div>
								<a href="javascript:void(0);" class="option-result__close remove-forever-result"><span
										class="hidden">Đóng</span>
									<svg class="icon" focusable="false" viewBox="0 0 96 96">
										<path
											d="M79.17 11.17L48 42.34 16.83 11.17l-5.66 5.66L42.34 48 11.17 79.17l5.66 5.66L48 53.66l31.17 31.17 5.66-5.66L53.66 48l31.17-31.17z">
										</path>
									</svg>
								</a>
							</div>
							<div class="pd-select-option off-change option-assured-buy-back" style="display: none;">
							</div>
							<div class="option-result-dev result-option-assured-buy-back" style="display: none;">
								<input type="hidden" class="hidden result-price">
							</div>
							<div class="option-divider emi-links" style="display: none;"></div>
							<div class="pd-buying-tool__emi-calculator" style="display: none;"></div>
						</div>
					</section>
				</div>
			</div>
			{!!$product->content!!}
		</div>
	</div>
</div>
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