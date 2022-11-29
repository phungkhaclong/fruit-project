@extends('admin.admin_layout')
@section('contentt')
<div class="container-fluid">
    <div class="card-body">
        <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" name="txtname" value="{{$user->name}}">
                    </div>
                </div>


                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="txtemail" class="form-control" value="{{$user->email}}">
                    </div>
                </div>
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng Thái</label>
                        <input type="text" name="txttrangthai" class="form-control" value="{{$user->trangthai}}">
                    </div>
                </div>
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Level</label>
                        <select name="level" class="form-control" value="{{$user->level}}">
                            <option value="{{__('user')}}">user </option>
                            <option value="{{__('admin')}}">admin </option>

                        </select>
                    </div>
                </div>
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chọn vai trò</label>
                        <select name="role_id[]" class="form-control select2_init" id="" multiple>
                            <option value="">admin</option>
                            @foreach($roles as $ro)
                            <option {{ $roleUser -> contains( 'id', $ro->id) ? 'selected':''}} value="{{$ro->id}}">{{$ro->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
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