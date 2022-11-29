@extends('admin.admin_layout')
@section('contentt')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <form action="{{route('role.update',$roles->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 pr-1">
                            <div class="form-group">
                                <label>Tên quản trị</label>
                                <input type="text" class="form-control" name="name" value="{{$roles->name}}">
                            </div>
                        </div>
                        <div class="col-md-8  pr-1">
                            <div class="form-group">
                                <label>Chức năng quản trị</label>
                                <input type="text" class="form-control" name="display_name" value="{{$roles->display_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" class="checkall">Checkall
                            </label>
                        </div>
                        @foreach($permission as $per)
                        <div class="card bg-light mb-3 col-md-12">
                            <h5 class="card-header text-white bg-info">
                                <label>
                                    <input type="checkbox" value="" class="checkbox_wrapper">
                                </label>
                                Module {{$per->name }}
                            </h5>
                            <div class="row">
                                @foreach($per->permissionChildrent as $perItem)
                                <div class="card-body text-primary col-md-3">
                                    <h4 class="card-title">
                                        <label for="">
                                            <input type="checkbox" class="checkbox_childrent" name="permission_id[]" {{$permissionchecked->contains('id',$perItem->id) ? 'checked' : ''}} value="{{$perItem->id}}">
                                        </label>
                                        {{$perItem->name}}
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
@section('jsadmin')
<script>
    $(function() {

        $('.checkbox_wrapper').on('click', function() {
            $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        });

        $('.checkall').on('click', function() {
            $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        });
    });
</script>
@endsection