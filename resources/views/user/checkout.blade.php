@extends('layouts.site')
@section('main')
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Tất cả loại quả</span>
                    </div>
                    <ul>
                        @foreach($category as $value)
                        <li><a href="{{route('user.category',['id'=>$value->id,'slug'=> Str::slug($value->name)])}}">{{$value->tenloai}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                @include('user.search_page.search')
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('../site')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('user.home')}}">Trang chủ</a>
                        <span>Thanh toán hóa đơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
            <form action="{{ route('placeorder')}}" method="POST">
                {{ csrf_field()}}
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ tên<span>*</span></p>
                                    <input type="text" class="form-control" name="hoten" id="firstName" placeholder="Nhập họ tên..." value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <input type="text" class="form-control" name="diachi" id="address" placeholder="Nhập địa chỉ..." required>
                                    <input type="text" class="form-control" hidden name="id_user" value="{{session()->get('infoUser')['id']}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" class="form-control" name="sdt" id="lastName" placeholder="Nhập số điện thoại..." value="" required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="" placeholder="Nhập email...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <textarea style="width: 730px;height:100px ;" type="text" name="ghichu" value="" placeholder="Lời nhắn.."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <?php
                            $content = Cart::content();
                            ?>
                            <h4>Hóa đơn của bạn</h4>

                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($content as $id => $con)
                            @php
                            $total += ($con->price * ($con->qty));
                            @endphp
                            <ul>
                                <li>{{$con->name}}
                                    <span>
                                        {{number_format($con->price * $con->qty)}}vnđ
                                    </span>
                                </li>
                            </ul>
                            @endforeach

                            <div class="checkout__order__subtotal">Tổng tiền <span>{{number_format($total)}}vnđ</span></div>
                            <div class="checkout__order__total">Tổng số <span>{{number_format($total)}}vnđ</span></div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="checkbox" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>

                            <button type="submit" class="site-btn">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@include('user.carousel_img.show')

<!-- Checkout Section End -->
@stop()