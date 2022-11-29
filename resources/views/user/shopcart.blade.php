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
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('user.home')}}">Trang chủ</a>
                        <span>giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="text-success"> {{ session('status') }}</div>

<section class="shoping-cart spad">
    <div class="cartshop_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <?php
                        $content = Cart::content();
                        ?>
                        <table class="update_cart_url">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th class="shoping__product">Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng số</th>
                                    <th>Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $con)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h5>{{$con->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__item">
                                        <img width="40%" src="{{URL::to('../image/'.$con->options->image)}}" alt="">
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{number_format($con->price).''.'vnđ/1kg'}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="pro-qty" style=" display: contents;">
                                            <form action="{{URL::to('/update_cart')}}" method="POST">
                                                {{ csrf_field()}}
                                                <input type="text" name="quantity_cart" value="{{$con->qty}}" class="cart_quantity_input" style="padding-top: 0px;width: 90px;">
                                                <input type="hidden" value="{{$con->rowId}}" name="rowId_cart" class="form-control">
                                                <input type="submit" value="cập nhập" name="update_qty" class="btn btn-primary btn-sm capnhap" style="width: 90px;height: 33px">
                                            </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php
                                        $sum = $con->price * $con->qty;
                                        echo number_format($sum) . '' . 'vnd';
                                        ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{URL::to('/delete_cart/'.$con->rowId)}}" class="btn btn-danger cart_delete">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('user.home')}}" class="primary-btn cart-btn cart-btn-right "><span class="icon_loading"></span>
                            Tiếp tục mua sắm</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền mua sắm</h5>
                        <ul>
                            <li>Tổng: {{Cart::subtotal(0).''.'vnđ/1kg'}}<span>vnđ</span></li>
                        </ul>
                        <a href="{{route('user.checkout')}}" class="primary-btn">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('user.carousel_img.show')

@stop()