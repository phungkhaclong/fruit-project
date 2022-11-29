@extends('admin.admin_layout')
@section('contentt')
<div class="container">
    <div class="row">
        <div class="form col-lg-12 ">
            <h3>Chi Tiết Hóa Đơn</h3>
            <table class="table ">
                <thead class="thead-dark">
                    <tr class="">
                        <th style="text-align:center" width="5%">ID_HoaDon</th>
                        <th style="text-align:center" width="20%">Tên Sản Phẩm</th>
                        <th style="text-align:center" width="10%">Số Lượng</th>
                        <th style="text-align:center" width="10%">Giá</th>
                        <!-- <th style="text-align:center" width="20%">Trạng Thái</th> -->
                    </tr>
                </thead>
                @foreach($chitiethoadons as $chitiethoadon)
                <tr>
                    <th style="text-align:center">{{$chitiethoadon->id_hoadon}}</th>
                    <th style="text-align:center">{{$chitiethoadon->TenSP}}</th>
                    <th style="text-align:center">{{$chitiethoadon->SoLuong}}</th>
                    <th style="text-align:center">{{$chitiethoadon->Gia}}.vnđ</th>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection