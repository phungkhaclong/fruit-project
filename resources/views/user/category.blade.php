@extends('layouts.site')
@section('main')
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
                <section class="breadcrumb-section set-bg" data-setbg="{{url('../site')}}/img/breadcrumb.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="breadcrumb__text">
                                    <h2>Shopping Cart</h2>
                                    <div class="breadcrumb__option">
                                        <a href="./index.html">Home</a>
                                        <span>{{$cat->tenloai}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row featured__filter" style="margin-top: 20px;">
                    @foreach($product as $pro)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg">
                                <a href="{{route('detail',['id'=>$pro->id])}}">
                                    <img src="{{url('../image')}}/{{$pro->Image1}}" alt="">
                                </a>
                                <form action="{{URL::to('/save_cart')}}" method="POST">
                                    <ul class="featured__item__pic__hover">
                                        <!-- <li><a href=""><i class="fa fa-heart"></i></a></li> -->
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
                                </form>

                            </div>
                            <div class="featured__item__text">
                                <h6 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:18px;">
                                    <a href="#">{{$pro->TenSP}}</a>
                                </h6>
                                <h5>{{$pro->GiaMoi}}/kg</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('user.carousel_img.show')

@stop()