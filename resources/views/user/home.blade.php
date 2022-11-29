@extends('layouts.site')
@section('main')

<!-- Hero Section Begin -->
<div class="text-success" style="text-align: left;"> {{ session('status') }}</div>
<section class="hero">
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
                <div class="hero__item set-bg" data-setbg="{{url('../site')}}/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>Chinchin</span>
                        <h2>Hoa quả <br /> <span style="font-size: 50px;">100% </span> </h2>
                        <p style="font-size: 30px;">không chất bảo quản</p>
                        <a href="{{route('user.shop')}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

@include('user.carousel_img.show')

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter=".all">Tất cả</li>
                        <li data-filter=".oranges">Sản phẩm mới</li>
                        <li data-filter=".fresh-meat">Sản phẩm giảm giá</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($product as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6 mix all ">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg">
                        <a href="{{route('detail',['id'=>$pro->id])}}">
                            <img src="{{url('../image')}}/{{$pro->Image1}}" alt="">
                        </a>
                        <ul class="featured__item__pic__hover">
                            <!-- <li><a href=""><i class="fa fa-heart"></i></a></li> -->
                            <li>
                                <form action="{{URL::to('/save_cart')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="qty" min="1" value="1" />
                                    <input name="product_idhidden" type="hidden" value="{{$pro->id}}" />
                                    <button type="submit" href="" class="primary-btn shoppingcarrt">
                                        <i class="fa fa-shopping-cart" style="font-size: 20px;">
                                        </i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:18px;">
                            <a href="{{route('detail',['id'=>$pro->id])}}">{{$pro->TenSP}}</a>
                        </h6>
                        <h5>{{$pro->Gia}}/kg</h5>
                    </div>
                </div>
            </div>
            <!-- </a> -->
            @endforeach
            @foreach($productsale as $prosale)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg">
                        <a href="{{route('detail',['id'=>$prosale->id])}}">
                            <img src="{{url('../image')}}/{{$prosale->Image1}}" alt="">
                        </a>
                        <form action="{{URL::to('/save_cart')}}" method="POST">
                            <ul class="featured__item__pic__hover">
                                <!-- <li><a href=""><i class="fa fa-heart"></i></a></li> -->
                                <li>
                                    <form action="{{URL::to('/save_cart')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="qty" min="1" value="1" />
                                        <input name="product_idhidden" type="hidden" value="{{$prosale->id}}" />
                                        <button type="submit" href="" class="primary-btn shoppingcarrt">
                                            <i class="fa fa-shopping-cart" style="font-size: 20px;">
                                            </i></button>
                                    </form>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="featured__item__text">
                        <h6 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:18px;">
                            <a href="{{route('detail',['id'=>$pro->id])}}">{{$prosale->TenSP}}</a>
                        </h6>

                        <div class="product__item__price">{{$prosale->GiaMoi}} <span style="text-decoration-line:line-through;color: red;">{{$prosale->Gia}}</span> /kg</div>
                    </div>
                </div>
            </div>
            <!-- </a> -->
            @endforeach
            @foreach($productnew as $pronew)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg">
                        <a href="{{route('detail',['id'=>$pronew->id])}}">
                            <img src="{{url('../image')}}/{{$pronew->Image1}}" alt="">
                        </a>
                        <form action="{{URL::to('/save_cart')}}" method="POST">
                            <ul class="featured__item__pic__hover">
                                <!-- <li><a href=""><i class="fa fa-heart"></i></a></li> -->
                                <li>
                                    <form action="{{URL::to('/save_cart')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="qty" min="1" value="1" />
                                        <input name="product_idhidden" type="hidden" value="{{$pronew->id}}" />
                                        <button type="submit" href="" class="primary-btn shoppingcarrt">
                                            <i class="fa fa-shopping-cart" style="font-size: 20px;">
                                            </i></button>
                                    </form>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="featured__item__text">
                        <h6 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:18px;">
                            <a href="{{route('detail',['id'=>$pro->id])}}">{{$pronew->TenSP}}</a>
                        </h6>
                        <h5>{{$pronew->Gia}}/kg</h5>
                    </div>
                </div>
            </div>
            <!-- </a> -->
            @endforeach
        </div>
    </div>
</section>

<section class="section gray-bg news" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Bài viết tin tức</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($tintuc as $blog)
            <div class="col-lg-4">
                <div class="blog-grid">
                    <div class="blog-img">
                        <div class="date">{{$blog->created_at->format('d/m/Y')}}</div>
                        <a href="{{route('news_detail',['id'=>$blog->id])}}">
                            <img style="width:400px ;height: 200px;" src="{{url('../image')}}/{{$blog->image}}" title="" alt="">
                        </a>
                    </div>
                    <div class="blog-info">
                        <h5 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="{{route('news_detail',['id'=>$blog->id])}}">{{$blog->Tieude}}</a></h5>
                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis ;">
                            {{$blog->Noidung}}
                        </p>
                        <div class="btn-bar">
                            <a href="{{route('news_detail',['id'=>$blog->id])}}" class="px-btn-arrow">
                                <span>Read More</span>
                                <i class="arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
@stop()