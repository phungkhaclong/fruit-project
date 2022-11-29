@extends('admin.admin_layout')
@section('title','Category List')
@section('contentt')
<div class="container">
    <h2>Danh sách danh mục</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="text-align:center"> ID </th>
                <th style="text-align:center"> Loại sản phẩm</th>
                <th style="text-align:center"> Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loaisanpham as $cat)
            <tr>
                <form action="{{route('category.destroy', $cat->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td style="text-align:center">{{$cat->id}}</td>
                    <td style="text-align:center">{{$cat->tenloai}}</td>
                    <td style="text-align:center">{{$cat->trangthai}}</td>
                    <td>
                        <a href="{{route('category.edit', $cat->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        @if($cat->trangthai==1)
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
        {{$loaisanpham->appends(request()->all())->links()}}
    </div>
</div>
@endsection