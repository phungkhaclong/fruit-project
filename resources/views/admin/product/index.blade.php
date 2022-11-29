@extends('admin.admin_layout')
@section('contentt')

<h2>Danh sách sản phẩm</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th style="text-align:center" width="5%"> ID</th>
            <th style="text-align:center" width="15%" style="text-align:center" width="50%"> Tên Sản Phẩm</th>
            <!-- <th style="text-align:center" width="20%"> Mã Loại</th>
            <th style="text-align:center" width="20%">Danh Mục</th> -->
            <th style="text-align:center" width="5%">Giá</th>
            <th style="text-align:center" width="8%">Giá Mới</th>
            <th style="text-align:center" width="20%">Hình Ảnh 1</th>
            <th style="text-align:center" width="20%">Hình Ảnh 2</th>
            <th style="text-align:center" width="10%">Số Lượng</th>
            <th style="text-align:center" width="20%">Mô tả</th>
            <th style="text-align:center" width="10%">Danh mục</th>
            <th style="text-align:center" width="10%"> Trạng Thái</th>
            <th style="text-align:center" width="20%" width="30%">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sanphams as $sanpham)
        <tr>
            <form action="{{route('product.destroy', $sanpham->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td style="text-align:center">{{$sanpham->id}}</td>
                <td style="text-align:center">{{$sanpham->TenSP}}</td>
                <!-- <td style="text-align:center"> {{$sanpham->MaLoai}}</td>
                <td style="text-align:center"> {{$sanpham->DanhMuc}}</td> -->
                <td style="text-align:center">{{number_format($sanpham->Gia)}} VND</td>
                <td style="text-align:center">{{number_format($sanpham->GiaMoi)}} VND</td>
                <td><img style="width:60%;display: block; margin-left: auto; margin-right: auto;" class="img-thumbnail" src="{{asset('image/'.$sanpham->Image1)}}"></td>
                <td><img style="width:60%;display: block; margin-left: auto; margin-right: auto;" class="img-thumbnail" src="{{asset('image/'.$sanpham->Image2)}}"></td>
                <td style="text-align:center">{{$sanpham->SoLuong}}</td>
                <td style="overflow: auto; display: flex;justify-content: space-around;height: 100px;">{{$sanpham->MoTa}}</td>
                <td style="text-align:center">{{$sanpham->DanhMuc}}</td>
                <td style="text-align:center">{{$sanpham->TrangThai}}</td>
                <td>
                    <a href="{{route('product.edit', $sanpham->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    @if($sanpham->TrangThai==1)
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy?')" class="btn btn-success"><i class="fa fa-trash"></i></button>
                    @else
                    <button type="submit" onclick="return confirm('Bạn có muốn khôi phục?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    @endif
                </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="">
    {{$sanphams->appends(request()->all())->links()}}
</div>
@endsection