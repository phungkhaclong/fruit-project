@extends('admin.admin_layout')
@section('contentt')
<div class="container">
    <div class="card-body">
        <form action="{{route('permission.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-10 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chọn tên</label>
                        <select name="module_parent" class="form-control " id="">
                            <option value="">Chọn tên module</option>
                            @foreach(config('permission.table_module') as $module)
                            <option value="{{$module}}">{{$module}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach(config('permission.module_childent') as $modulechildent)
                        <div class="form-group col-md-3">
                            <label for="">
                                <input type="checkbox" name="module_chilrent[]" value="{{$modulechildent}}">{{$modulechildent}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Thêm</button>
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