@extends('admin.admin_layout')
@section('contentt')
<div class="content">
    <form action="{{route('order.update',$hoadons->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-5 pr-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ Tên</label>
                    <input type="text" name="hoten" class="form-control" placeholder="Họ Tên" value="{{$hoadons->hoten}}">
                </div>
            </div>
            <div class="col-md-5 pr-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">SĐT</label>
                    <input type="text" name="sdt" class="form-control" placeholder="SĐT" value="{{$hoadons->sdt}}">
                </div>
            </div>
            <div class="col-md-5 pr-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa Chỉ</label>
                    <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ" value="{{$hoadons->diachi}}">
                </div>
            </div>
            <div class="col-md-5 pr-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">Trạng Thái</label>
                    <select name="trangthai" class="form-control" value="{{$hoadons->trangthai}}">
                        <option value="{{__('Đã đặt')}}">Đã đặt </option>
                        <option value="{{__('Đã xác nhận')}}">Đã xác nhận </option>
                        <option value="{{__('Đang giao hàng')}}">Đang giao hàng  </option>
                        <option value="{{__('Đã hủy')}}">Đã hủy </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
    </form>
</div>
@endsection