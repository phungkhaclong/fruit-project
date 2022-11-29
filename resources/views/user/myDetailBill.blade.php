@extends('layouts.site')
@section('main')

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

<section class="breadcrumb-section set-bg" data-setbg="{{url('../site')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết hóa đơn</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('user.home')}}">Home</a>
                        <span>Chi tiết hóa đơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="form-container">
        <h3>Chi Tiết Hóa Đơn</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr class="">
                    <th style="text-align:center" width="5%">ID_HoaDon</th>
                    <th style="text-align:center" width="20%">Tên Sản Phẩm</th>
                    <th style="text-align:center" width="10%">Số Lượng</th>
                    <th style="text-align:center" width="10%">Giá</th>
                    <!-- <th style="text-align:center" width="20%">Trạng Thái</th> -->
                </tr>
            </thead>
            @foreach($chitiethoadons ?? '' as $chitiethoadon)
            <tr>
                <th style="text-align:center">{{$chitiethoadon->id_hoadon}}</th>
                <th style="text-align:center">{{$chitiethoadon->TenSP}}</th>
                <th style="text-align:center">{{$chitiethoadon->SoLuong}}/kg</th>
                <th style="text-align:center">{{$chitiethoadon->Gia}}.vnđ</th>
                <!-- <th style="text-align:center">{{$chitiethoadon->TrangThai}}</th> -->
            </tr>
            @endforeach
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('user.mybill',$infoUser['id'])}}" class="primary-btn cart-btn cart-btn-right "><span class="icon_loading"></span>
                            Quay lại hóa đơn</a>
                    </div>
                </div>
            </div>
        </table>
    </div>
</div>


@stop()