@extends('admin.admin_layout')
@section('contentt')
<div class="content-fluid">
    <div class="card-body">
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" name="txtname" value="">
                    </div>
                </div>
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="txtpassword" value="">
                    </div>
                </div>

                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="txtemail" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng Thái</label>
                        <input type="text" name="txttrangthai" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chọn vai trò</label>
                        <select name="role_id[]" class="form-control select2_init" id="" multiple>
                            <option value="">admin</option>
                            @foreach($roles as $ro)
                            <option value="{{$ro->id}}">{{$ro->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Thêm</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection
@section('jsadmin')
<script>
    $('.select2_init').select2({
        'placeholder': 'Chọn vai trò'
    })
</script>
@endsection