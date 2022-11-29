@extends('admin.admin_layout')
@section('contentt')

<h2>Danh sách bình luận sản phẩm</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th style="text-align:center" width="5%">ID</th>
    
            <th style="text-align:center" width="15%">Name</th>
            <th style="text-align:center" width="5%">ID_SANPHAM</th>
            <th style="text-align:center" width="25%">Nội Dung</th>
            <th style="text-align:center" width="5%">Trạng Thái</th>
            <th style="text-align:center" width="15%">Ngày Đăng</th>
            <th style="text-align:center" width="10%">Tùy Chọn</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        @foreach($binhluan as $bl)
        <tr>
            <form action="{{route('comment.destroy', $bl->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td style="text-align:center">{{$bl->id}}</td>
                
                <td style="text-align:center">{{$bl->name}}</td>
                <td style="text-align:center">{{$bl->id_sanpham}}</td>
                <td style="text-align:center">{{$bl->noidung}}</td>
                <td style="text-align:center">{{$bl->trangthai}}</td>
                <td style="text-align:center">{{$bl->ngaydang}}</td>
                <td style="text-align:center">
                    @if($bl->trangthai==1)
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
    {{$binhluan->appends(request()->all())->links()}}
</div>

@endsection