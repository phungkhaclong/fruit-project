@extends('admin.admin_layout')
@section('contentt')
<div class="card-body">
    <form method="post" action="{{route('category.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4 pr-1">
                <div class="form-group">
                    <label>Tên Loại</label>
                    <input type="text" class="form-control" name="tenloai" placeholder="tên loại sản phẩm">
                </div>
            </div>
            <div class="col-md-4 pl-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">Trạng Thái</label>
                    <input type="text" name="trangthai" class="form-control" placeholder="trạng thái">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-fill pull-right">Thêm</button>
    </form>
</div>

@endsection