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
<section class="breadcrumb-section set-bg" data-setbg="{{url('../site')}}/img/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bài viết</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('user.home')}}">Trang chủ</a>
                        <span>Bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="text-success"> {{ session('status') }}</div>
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>Bài viết đang xem</h4>
                        @foreach($chitiettintuc as $blog)
                        <div class="blog__sidebar__recent">
                            <a href="{{route('news_detail',['id'=>$blog->id])}}" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__text">
                                    <img width="20%" src="{{url('../image')}}/{{$blog->image}}" alt="">
                                    <h6>{{$blog->Tieude}}</h6>
                                    <span>{{$blog->created_at}}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Có thể bạn quan tâm</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach($product as $pronew)
                                <div class="latest-prdouct__slider__item">
                                    <a href="{{route('detail',['id'=>$pronew->id])}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{url('../image')}}/{{$pronew->Image1}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$pronew->TenSP}}</h6>
                                            <span>{{$pronew->Gia}}</span>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($chitiettintuc as $blog)
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img width="650px" height="350px" src="{{url('../image')}}/{{$blog->image}}" alt="">
                    <h4>{{$blog->Tieude}}</h4><br>
                    <p>{{$blog->Noidung}}</p>
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{url('../admin123')}}/dist/img/long.jpg" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>Phùng Khắc Long</h6>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Bài viết ngày:</span> {{$blog->created_at->format('d/m/Y')}}</li>
                                    <li><span>Viết bởi:</span> Long, Quân, Tiến , Duy , Hào </li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="https://www.facebook.com/long.phungkhac"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.facebook.com/long.phungkhac"><i class="fa fa-twitter"></i></a>
                                    <!-- <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- @include('user.carousel_img.show') -->

@stop()