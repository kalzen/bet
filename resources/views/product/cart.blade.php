@extends('layouts.master')
@section('content')
<div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="{{route('index')}}">Trang chủ</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Giỏ hàng
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="cart-wrapper">
                                                <form method="post" action="#" class="woocommerce-cart-form">
                                                    <table class="shop_table shop_table_responsive cart">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name">Sản phẩm</th>
                                                                <th class="product-price">Giá</th>
                                                                <th class="product-quantity">Số tượng</th>
                                                                <th class="product-subtotal">Tổng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cartData as $item)
                                                            <tr>
                                                                <td class="product-remove">
                                                                    <a class="remove" data-model="{{$item['product']->code}}" onclick="removeFromCart(this)" href="#">×</a> 
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href="{{ route('product.detail',['alias' => $item['product']->slug]) }}">
                                                                        <img width="180" height="180" alt="" class="wp-post-image" src="{{ route('product.detail',['alias' => $item['product']->slug]) }}">
                                                                    </a>
                                                                </td>
                                                                <td data-title="Product" class="product-name">
                                                                    <div class="media cart-item-product-detail">
                                                                        <a href="{{ route('product.detail',['alias' => $item['product']->slug]) }}">
                                                                            <img width="180" height="180" alt="" class="wp-post-image" src="{{$item['product']->images->first()->url}}">
                                                                        </a>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="{{ route('product.detail',['alias' => $item['product']->slug]) }}">{{$item['product']->title}}</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td data-title="Price" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        {{$item['price_html']}}
                                                                    </span>
                                                                </td>
                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                        <label for="quantity-input-1">Quantity</label>
                                                                        <input id="quantity-input-{{$item['product']->code}}" type="number" name="cart[{{$item['product']->code}}][qty]" value="{{ $item['quantity']}}" title="Qty" class="input-text qty text" size="4" min="1" onchange="updateCartItem(this, '{{$item['product']->code}}')">
                                                                    </div>
                                                                </td>
                                                                <td data-title="Total" class="product-subtotal" >
                                                                <span class="woocommerce-Price-amount amount" id="subtotal-{{$item['product']->code}}">
                                                                        {{ number_format($item['price'] * $item['quantity']) }}
                                                                    </span>
                                                                    <a data-model="{{$item['product']->code}}" onclick="removeFromCart(this)" title="Remove this item" class="remove"  href="#">×</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!-- .shop_table shop_table_responsive -->
                                                </form>
                                                <!-- .woocommerce-cart-form -->
                                                <div class="cart-collaterals">
                                                    <div class="cart_totals">
                                                        <h2>Thanh toán</h2>
                                                        <table class="shop_table shop_table_responsive">
                                                                <tbody>
                                                                <tr class="cart-subtotal">
                                                                        <th>Tổng phụ</th>
                                                                        <td data-title="Subtotal">
                                                                            <span class="woocommerce-Price-amount amount" id="total-price">
                                                                                {{ number_format($total_price) }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="shipping">
                                                                        <th>Phí vận chuyển</th>
                                                                       <!-- <td data-title="Shipping">Flat rate</td> -->
                                                                    </tr>
                                                                    <tr class="order-total">
                                                                        <th>Tổng cộng</th>
                                                                        <td data-title="Total">
                                                                            <strong>
                                                                                <span class="woocommerce-Price-amount amount" id="total-amount">
                                                                                    {{ number_format($total_price) }}
                                                                                </span>
                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                        </table>
                                                        <!-- .shop_table shop_table_responsive -->
                                                        <div class="wc-proceed-to-checkout">
                                                        <!--    <form class="woocommerce-shipping-calculator" method="post" action="#">
                                                              <p>
                                                                    <a class="shipping-calculator-button" data-toggle="collapse" href="#shipping-form" aria-expanded="false" aria-controls="shipping-form">Calculate shipping</a>
                                                                </p>
                                                                <div class="collapse" id="shipping-form">
                                                                    <div class="shipping-calculator-form">
                                                                        <p id="calc_shipping_country_field" class="form-row form-row-wide">
                                                                            <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                                                                <option value="">Select a country…</option>
                                                                                <option value="AX">Åland Islands</option>
                                                                                <option value="AF">Afghanistan</option>
                                                                                <option value="AL">Albania</option>
                                                                                <option value="DZ">Algeria</option>
                                                                                <option value="AS">American Samoa</option>
                                                                                <option value="AD">Andorra</option>
                                                                                <option value="AO">Angola</option>
                                                                                <option value="AI">Anguilla</option>
                                                                                <option value="AQ">Antarctica</option>
                                                                                <option value="AG">Antigua and Barbuda</option>
                                                                                <option value="AR">Argentina</option>
                                                                                <option value="AM">Armenia</option>
                                                                                <option value="AW">Aruba</option>
                                                                                <option value="AU">Australia</option>
                                                                                <option value="AT">Austria</option>
                                                                                <option value="AZ">Azerbaijan</option>
                                                                            </select>
                                                                        </p>
                                                                        <p id="calc_shipping_state_field" class="form-row form-row-wide validate-required">
                                                                            <span>
                                                                                <select id="calc_shipping_state" name="calc_shipping_state">
                                                                                    <option value="">Select an option…</option>
                                                                                    <option value="AP">Andhra Pradesh</option>
                                                                                    <option value="AR">Arunachal Pradesh</option>
                                                                                    <option value="AS">Assam</option>
                                                                                    <option value="BR">Bihar</option>
                                                                                    <option value="CT">Chhattisgarh</option>
                                                                                    <option value="GA">Goa</option>
                                                                                    <option value="GJ">Gujarat</option>
                                                                                    <option value="HR">Haryana</option>
                                                                                    <option value="HP">Himachal Pradesh</option>
                                                                                    <option value="JK">Jammu and Kashmir</option>
                                                                                    <option value="JH">Jharkhand</option>
                                                                                    <option value="KA">Karnataka</option>
                                                                                    <option value="KL">Kerala</option>
                                                                                    <option value="MP">Madhya Pradesh</option>
                                                                                    <option value="MH">Maharashtra</option>
                                                                                    <option value="MN">Manipur</option>
                                                                                    <option value="ML">Meghalaya</option>
                                                                                    <option value="MZ">Mizoram</option>
                                                                                    <option value="NL">Nagaland</option>
                                                                                    <option value="OR">Orissa</option>
                                                                                    <option value="PB">Punjab</option>
                                                                                    <option value="RJ">Rajasthan</option>
                                                                                    <option value="SK">Sikkim</option>
                                                                                    <option value="TN">Tamil Nadu</option>
                                                                                    <option value="TS">Telangana</option>
                                                                                    <option value="TR">Tripura</option>
                                                                                    <option value="UK">Uttarakhand</option>
                                                                                    <option value="UP">Uttar Pradesh</option>
                                                                                    <option value="WB">West Bengal</option>
                                                                                    <option value="AN">Andaman and Nicobar Islands</option>
                                                                                    <option value="CH">Chandigarh</option>
                                                                                    <option value="DN">Dadra and Nagar Haveli</option>
                                                                                    <option value="DD">Daman and Diu</option>
                                                                                    <option value="DL">Delhi</option>
                                                                                    <option value="LD">Lakshadeep</option>
                                                                                    <option value="PY">Pondicherry (Puducherry)</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
                                                                            <input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / ZIP" value="" class="input-text">
                                                                        </p>
                                                                        <p>
                                                                            <button class="button" value="1" name="calc_shipping" type="submit">Update totals</button>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </form> -->
                                                            <!-- .wc-proceed-to-checkout -->
                                                            <a class="checkout-button button alt wc-forward" href="{{route('checkout')}}">
				Tiến hành thanh toán</a>
                                                            <a class="back-to-shopping" href="{{route('index')}}">Tiếp tục mua hàng</a>
                                                        </div>
                                                        <!-- .wc-proceed-to-checkout -->
                                                    </div>
                                                    <!-- .cart_totals -->
                                                </div>
                                                <!-- .cart-collaterals -->
                                            </div>
                                            <!-- .cart-wrapper -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
@endsection
