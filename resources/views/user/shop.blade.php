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
                    <h2>Cửa hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Cửa hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Loại quả</h4>
                        <ul>
                            @foreach($category as $value)
                            <li><a href="{{route('user.category',['id'=>$value->id,'slug'=> Str::slug($value->name)])}}">{{$value->tenloai}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach($productnew as $pronew)
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
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sản phẩm giảm giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($productsale as $prosale)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="{{url('../image')}}/{{$prosale->Image1}}">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
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
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Cửa hàng giảm giá</span>
                                        <h5><a href="#">{{$prosale->TenSP}}</a></h5>
                                        <div class="product__item__price">{{$prosale->GiaMoi}} <span>{{$prosale->Gia}}</span> /kg</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="row featured__filter">
                    @foreach($product as $pro)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg">
                                <a href="{{route('detail',['id'=>$pro->id])}}">
                                    <img src="{{url('../image')}}/{{$pro->Image1}}" alt="">
                                </a>
                                <ul class="featured__item__pic__hover">
                                    <li>
                                        <form action="{{URL::to('/save_cart')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="qty" min="1" value="1" />
                                            <input name="product_idhidden" type="hidden" value="{{$pro->id}}" />
                                            <button type="submit" href="" class="primary-btn shoppingcarrt">
                                                <i class="fa fa-shopping-cart" style="font-size: 20px;">
                                                </i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:18px;">
                                    <a href="#">{{$pro->TenSP}}</a>
                                </h6>
                                <h5>{{$pro->GiaMoi}}/kg</h5>
                            </div>
                        </div>
                    </div>
                    <!-- </a> -->
                    @endforeach
                    <div style="   padding-left: 500px;">
                        {{$product->appends(request()->all())->links()}}
                    </div>
                </div>
                <!-- <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div> -->
            </div>

        </div>
    </div>
</section>
<!-- Product Section End -->
@include('user.carousel_img.show')
@stop()
@section('js')
@include('layouts.js')
@endsection