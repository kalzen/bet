<footer class="site-footer footer-v1">
            <div class="col-full">
                <!-- .before-footer-wrap -->
                <div class="footer-widgets-block">
                    <div class="row">
                        <div class="footer-contact">
                            <div class="footer-logo">
                                <a href="{{route('index')}}" class="custom-logo-link" rel="home">
                                    <img src="{{asset('samfan/assets/images/logo-samfan.png')}}" alt="logo">
                                </a>
                            </div>
                            <!-- .footer-logo -->
                            <div class="contact-payment-wrap">
                                <div class="footer-contact-info">
                                    <div class="media">
                                        <div class="media-body">
                                        <h5 class="footer-payment-info-title">Hỗ trợ thanh toán</h5>
                                            <div class="footer-payment-icons">
                                                <ul class="list-payment-icons nav">
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="{{asset('samfan/assets/images/credit-cards/mastercard.svg')}}"
                                                            alt="mastercard" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="{{asset('samfan/assets/images/credit-cards/visa.svg')}}"
                                                            alt="visa" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .footer-contact-info -->
                                <div class="footer-payment-info">
                                        <div class="media">
                                            <span class="media-left icon media-middle">
                                                <i class="tm tm-safe-payments"></i>
                                            </span>
                                            <div class="media-body">
                                                <h5 class="footer-payment-info-title">Thanh toán chuyển khoản/ trả góp</h5>
                                                <div class="footer-payment-icons">
                                                    <ul class="list-payment-icons nav">
                                                        <li class="nav-item">
                                                            <img class="payment-icon-image" src="{{asset('samfan/assets/images/homecredit.png')}}" alt="mastercard">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .footer-payment-icons -->
                                                <div class="footer-secure-by-info">
                                                    <h6 class="footer-secured-by-title">Secured by:</h6>
                                                    <ul class="footer-secured-by-icons">
                                                        <li class="nav-item">
                                                            <img class="secure-icons-image" src="{{asset('samfan/assets/images/secured-by/norton.svg')}}" alt="norton">
                                                        </li>
                                                        <li class="nav-item">
                                                            <img class="secure-icons-image" src="{{asset('samfan/assets/images/secured-by/mcafee.svg')}}" alt="mcafee">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .footer-secure-by-info -->
                                            </div>
                                            <!-- .media-body -->
                                        </div>
                                        <!-- .media -->
                                    </div>
                            </div>
                            <!-- .contact-payment-wrap -->
                             
                        </div>
                        <!-- .footer-contact -->
                        <div class="footer-widgets">
                            <div class="columns">
                                <aside class="widget clearfix">
                                    <div class="body">
                                        <h4 class="widget-title">Về chúng tôi</h4>
                                        <div class="menu-footer-menu-1-container">
                                            <ul id="menu-footer-menu-1" class="menu">
                                                <li class="menu-item">
                                                    <a href="#">Giới thiệu</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Quy trình giao hàng</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Lợi ích mua hàng</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Hướng dẫn mua hàng</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Xuất hóa đơn VAT</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .menu-footer-menu-1-container -->
                                    </div>
                                    <!-- .body -->
                                </aside>
                                <!-- .widget -->
                            </div>
                            <!-- .columns -->
                            <div class="columns">
                                <aside class="widget clearfix">
                                    <div class="body">
                                        <h4 class="widget-title">Sản Phẩm</h4>
                                        <div class="menu-footer-menu-2-container">
                                            <ul id="menu-footer-menu-2" class="menu">
                                                @foreach ($shared_categories as $cat)
                                                <li class="menu-item">
                                                    <a href="{{route('product.catalogue', ['alias' => $cat->slug])}}">{{$cat->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- .menu-footer-menu-2-container -->
                                    </div>
                                    <!-- .body -->
                                </aside>
                                <!-- .widget -->
                            </div>
                            <!-- .columns -->
                            <div class="columns">
                                <aside class="widget clearfix">
                                    <div class="body">
                                        <h4 class="widget-title">Chính sách</h4>
                                        <div class="menu-footer-menu-3-container">
                                            <ul id="menu-footer-menu-3" class="menu">
                                                <li class="menu-item">
                                                    <a href="#">Chính sách vận chuyển</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Chính sách kiểm hàng</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Chính sách đổi trả</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Chính sách bảo hành</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Bảng giá vật tư lắp đặt</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Trung tâm bảo hành</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Cộng tác bán hàng</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .menu-footer-menu-3-container -->
                                    </div>
                                    <!-- .body -->
                                </aside>
                                <!-- .widget -->
                            </div>
                            <!-- .columns -->
                        </div>
                        <!-- .footer-widgets -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .footer-widgets-block -->
                <div class="site-info">
                    <div class="col-full">
                        <div class="copyright">Copyright &copy; 2024 <a href="#">Samfan</a>. All rights reserved.</div>
                        <!-- .copyright -->
                        <div class="credit">Made with
                            <i class="fa fa-heart"></i> by Kalzen Dev.
                        </div>
                        <!-- .credit -->
                    </div>
                    <!-- .col-full -->
                </div>
                <!-- .site-info -->
            </div>
            <!-- .col-full -->
        </footer>