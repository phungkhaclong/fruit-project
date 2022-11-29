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
                    <h2>Hóa đơn của tôi</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('user.home')}}">Home</a>
                        <span>Hóa đơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="col-sm-6 col-lg-12 mb-3">
        <div class="title-left">
            <h3>HÓA ĐƠN</h3>
            <div class="text-danger" style="text-align: left;"> {{ session('status') }}</div>
        </div>
        @if(count($hoadons)==0)
        <p>Bạn không có hóa đơn nào...</p>
        @else
        <table class="table">
            <thead class="thead-dark">
                <tr class="">
                    <th style="text-align:center" width="15%">Họ Tên</th>
                    <th style="text-align:center" width="10%">SĐT</th>
                    <th style="text-align:center" width="20%">Địa Chỉ</th>
                    <th style="text-align:center" width="20%">Ghi chú</th>
                    <th style="text-align:center" width="10%"> Trạng Thái</th>
                    <th style="text-align:center" width="10%">Xem Chi Tiết</th>
                    <th style="text-align:center" width="10%">Tùy chọn</th>
                </tr>
            </thead>
            @foreach($hoadons as $hoadon)
            <tr>
                <th style="text-align:center">{{$hoadon->hoten}}</th>
                <th style="text-align:center">{{$hoadon->sdt}}</th>
                <th style="text-align:center">{{$hoadon->diachi}}</th>
                <th style="overflow: auto; display: flex;justify-content: space-around;height: 100px;text-align:center">{{$hoadon->ghichu}}</th>
                @if($hoadon->trangthai=="Đã đặt")
                <th style="text-align:center;color:green">{{$hoadon->trangthai}}</th>
                @else
                <th style="text-align:center;color:red">{{$hoadon->trangthai}}</th>
                @endif
                <td style="text-align:center"><a class="btn btn-lock" href="{{route('user.myDetailBill',$hoadon->id)}}"><i class="fa fa-eye"></i></a>
                </td>
                @if($hoadon->trangthai=="Đã đặt")
                <td style="text-align:center">
                    <form action="{{route('user.mybill', $hoadon->id)}}" method="POST">
                        @csrf
                        @if($hoadon->trangthai=='Đã đặt')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy?')" class="btn btn-success"><i class="fa fa-trash"></i></button>
                        @else
                        <button type="submit" onclick="return confirm('Bạn có muốn khôi phục?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        @endif
                </td>
                </form>
                @else
                <td style="text-align:center">
                    <form action="{{route('user.mybill', $hoadon->id)}}" method="POST">
                        @csrf
                        <button type="submit" onclick="return confirm('Bạn có muốn khôi phục?')" class="btn btn-success"><i class="fa fa-trash"></i></button>
                </td>
                </form>
                @endif
            </tr>
            @endforeach
        </table>
        <div class="clearfix"></div>
    </div>
    @endif
    <div style="   padding-left: 500px;">
        {{$hoadons->appends(request()->all())->links()}}
    </div>
</div>


@stop()
@section('js')
@endsection