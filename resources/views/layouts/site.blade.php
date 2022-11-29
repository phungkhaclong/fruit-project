<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoa quả chinchin</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('../site')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{url('../site')}}/css/chinchin.css" type="text/css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> phungkhaclong14071999@gmail.com</li>

                                <li>Chào mừng bạn đến với web của chúng tôi</li>
                                <?php

                                use Carbon\Carbon;
                                ?>
                                <li>
                                    Hà Nội ngày:{{Carbon::now()->format('d-m-Y')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="header__top__right">
                            <div class="our-link header__top__right__auth">
                                <ul class="login_user" style="list-style-type:none ;display: flex;">
                                    @if(session()->has('infoUser'))
                                    <li>
                                        <a href="{{route('user.infouser')}}"><i class="fa fa-user s_color"></i>
                                            <?php
                                            $infoUser = session()->get('infoUser') ?>
                                            {{$infoUser['name']}}</a>
                                    </li>
                                    <li style="margin-left: 20px;">
                                        <a href="{{route('user.mybill',$infoUser['id'])}}"><i class="fa fa-address-card-o"></i>Hóa Đơn</a>
                                    </li>
                                    @else
                                    <a href="{{route('user.login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
                                    @endif
                                    <li style="margin-left: 20px;">
                                        <a href="{{ route('getLogout') }}"><i class="fa fa-sign-out"></i>Đăng Xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid menu_top">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('user.home')}}"><img style="width: 50%;" src="{{url('../site')}}/img/logochin.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('user.home')}}">Trang chủ</a></li>
                            <li><a href="{{route('user.shop')}}">Cửa hàng</a></li>
                            <li><a href="#">Đặt hàng</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('user.shopcart')}}">Giỏ hàng</a></li>
                                    <li><a href="{{route('user.checkout')}}">Thanh toán</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('user.news')}}">Tin tức</a></li>
                            <li><a href="{{route('user.contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__cart" style="padding-right: 100px;">
                        <div class="icom_cart">
                            <ul style="padding-right: 100px;">
                                <!-- <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li> -->
                                <li>
                                    <a href="{{route('user.shopcart')}}">
                                        <i class="fa fa-shopping-basket">
                                        </i> <span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </header>
    <!-- Header Section End -->




    @yield('main')


    <!-- Footer Section Begin -->

    <footer class="footer spad_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('user.home')}}"><img style="width: 65%;" src="{{url('../site')}}/img/logochin.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Phùng Xá-Thạch Thất-Hà Nội</li>
                            <li>Phone: 0342130522</li>
                            <li>Email:phungkhaclong14071999@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Danh sách liên hệ</h6>
                        <ul>
                            <li><a href="{{route('user.home')}}">Trang chủ</a></li>
                            <li><a href="{{route('user.shop')}}">Cửa hàng</a></li>
                            <li><a href="{{route('user.shopcart')}}">Giỏ hàng</a></li>
                            <li><a href="{{route('user.checkout')}}">Thanh toán</a></li>
                            <li><a href="{{route('user.contact')}}">Liên hệ</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- Map Begin -->
                    <h3>Liên hệ</h3>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20666.680658759113!2d105.61900193394263!3d21.01620475132576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313450cefdb88edf%3A0x5dfd124f70227029!2zUGjDuW5nIFjDoSwgVGjhuqFjaCBUaOG6pXQsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655350109574!5m2!1svi!2s" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Hà Nội &copy;
                                Phùng Khắc Long | Chinchin <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.facebook.com/long.phungkhac" target="_blank">Facebook</a>
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    <!-- Footer Section End -->


    <!-- Js Plugins -->
    <script src="{{url('../site')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('../site')}}/js/bootstrap.min.js"></script>
    <script src="{{url('../site')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{url('../site')}}/js/jquery-ui.min.js"></script>
    <script src="{{url('../site')}}/js/jquery.slicknav.js"></script>
    <script src="{{url('../site')}}/js/mixitup.min.js"></script>
    <script src="{{url('../site')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('../site')}}/js/main.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


    @yield('js')
</body>

</html>