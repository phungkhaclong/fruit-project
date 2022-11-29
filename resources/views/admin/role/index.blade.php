@extends('admin.admin_layout')
@section('contentt')

<div class="container">
    <h2>Danh sách quản trị</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="text-align:center" width="10%"> ID</th>
                <th style="text-align:center" width="20%">Tên quản trị</th>
                <th style="text-align:center" width="20%">Chức năng</th>
                <th style="text-align:center" width="20%">Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($role as $ro)
            <tr>
                <th style="text-align:center">{{$ro->id}}</th>
                <th style="text-align:center">{{$ro->name}}</th>
                <th style="text-align:center">{{$ro->display_name}}</th>
                <form action="{{route('role.destroy', $ro->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td style="text-align:center">
                        <a href="{{route('role.edit', $ro->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="">
    {{$role->appends(request()->all())->links()}}
</div>
@endsection