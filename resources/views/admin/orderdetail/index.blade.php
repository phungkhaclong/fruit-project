@extends('admin.admin_layout')
@section('contentt')
<div class="container">
    <h2>Danh sách chi tiết hóa đơn</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th style="text-align:center" width="5%"> ID</th>
            <th style="text-align:center" width="5%">ID_HoaDon</th>
            <th style="text-align:center" width="5%">ID_Sanpham</th>
            <th style="text-align:center" width="20%">Tên Sản Phẩm</th>
            <th style="text-align:center" width="10%">Số Lượng</th>
            <th style="text-align:center" width="10%">Giá</th>
            <!-- <th style="text-align:center" width="20%">Thành Tiền</th>
            <th style="text-align:center" width="20%">Trạng Thái</th> -->
            <th style="text-align:center" width="20%">Tùy Chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hoadonchitiet as $chitiet)
        <tr>
            <th style="text-align:center">{{$chitiet->id}}</th>
            <th style="text-align:center">{{$chitiet->id_hoadon}}</th>
            <th style="text-align:center">{{$chitiet->id_sanpham}}</th>
            <th style="text-align:center">{{$chitiet->TenSP}}</th>
            <th style="text-align:center">{{$chitiet->SoLuong}}</th>
            <th style="text-align:center">{{$chitiet->Gia}}</th>

            <form action="{{route('orderdetail.destroy', $chitiet->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td style="text-align:center">

                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="">
    {{$hoadonchitiet->appends(request()->all())->links()}}
</div></div>
@endsection