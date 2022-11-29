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
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('../site')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thông tin chi tiết</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('user.home')}}">Trang chủ</a>
                        <a href="#">Loại quả</a>
                        <span>{{$data['TenSP']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        @foreach($product as $pro)
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="product__details__pic">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{url('../image')}}/{{$data['Image1']}}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{url('../image')}}/{{$data['Image2']}}" alt="Second slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Trở Lại</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Tiếp Tục</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="product__details__text col-md-4">
                        <h3>{{$data['TenSP']}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{$data['GiaMoi']}} vnđ</div>

                        <form action="{{URL::to('/save_cart')}}" method="POST">
                            {{csrf_field()}}
                            <label>Số Lượng</label><br>
                            <input style="width: 200px;text-align: center;" type="number" name="qty" min="1" value="1" /><br>
                            <input name="product_idhidden" type="hidden" value="{{$data['id']}}" />
                            <button style="width: 200px;margin-top: 15px" type="submit" href="" class="primary-btn se">ADD TO CARD</button>
                            <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                        </form>
                    </div>
                    <div class="col-md-8">
                        <h3 style="font-family: 'FontAwesome';">Mô tả về sản phẩm:</h3>
                        <span>
                            <p style="font-size:20px; font-family: 'FontAwesome';">{{$data['MoTa']}}</p>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container my-5">
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    <h2>Bình Luận</h2>
                </div>
                <div class="card-body">
                    <div id="binhluan">
                        @foreach($binhluan as $cmt)
                        <div class="media mb-3">
                            <div class="mr-2">
                                <small class="text-muted">{{$cmt->name}}</small>
                            </div>
                            <div class="media-body">
                                <p>{{$cmt->noidung}}</p>
                                <small class="text-muted">{{$cmt->ngaydang}}</small>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    @if(session()->has('infoUser'))
                    <?php $infoUser = session()->get('infoUser') ?>
                    <form id="myComment">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mb-0">Tên: </label>
                                <input type="text" readonly name="name" class="form-control" id="inputname" value="{{$infoUser['name']}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="noidung" class="mb-0">Nội dung: </label>
                                <input type="text" name="noidung" class="form-control" id="inputcontent" placeholder="Input Your Review">
                            </div>
                        </div>
                        <input type="text" name="id_user" hidden class="form-control" id="inputid_user" value="{{$infoUser['id']}}">
                        <input type="text" name="id_sanpham" hidden class="form-control" id="inputid_sanpham" value="{{$data['id']}}">
                        <input type="text" name="trangthai" hidden class="form-control" id="inputtrangthai" value="1">
                        <input type="text" name="ngaydang" hidden class="form-control" id="inputngaydang" value="{{$date->toDayDateTimeString()}}">
                        <button type="submit" class="btn hvr-hover" id="submit">Gửi</button>
                    </form>
                    @else
                    <a href="{{route('user.login')}}" class="btn hvr-hover">Vui lòng đăng nhập để bình luận</a>
                    @endif
                </div>
            </div>
        </div>
</section>

<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Có thể bạn quan tâm</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($prolienquan as $lq)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg">
                        <a href="{{route('detail',['id'=>$lq->id])}}">
                            <img src="{{url('../image')}}/{{$lq->Image1}}" alt="">
                        </a>
                        <ul class="product__item__pic__hover">
                            <li>
                                <form action="{{URL::to('/save_cart')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="qty" min="1" value="1" />
                                    <input name="product_idhidden" type="hidden" value="{{$lq->id}}" />
                                    <button type="submit" href="" class="primary-btn shoppingcarrt">
                                        <i class="fa fa-shopping-cart" style="font-size: 20px;">
                                        </i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route('detail',['id'=>$lq->id])}}">{{$lq->TenSP}}</a></h6>
                        <h5>{{$lq->GiaMoi}}vnđ</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@include('user.carousel_img.show')
@stop()
@section('js')
@include('layouts.js')
@endsection