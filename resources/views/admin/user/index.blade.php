@extends('admin.admin_layout')
@section('contentt')

<div class="container">
    <h2>Danh sách người dùng</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th> ID</th>
                <th style="text-align:center" width="20%">Họ Tên</th>
                <th style="text-align:center" width="20%">Email</th>
                <th style="text-align:center" width="15%">Trạng thái</th>
                <th style="text-align:center" width="15%">Level</th>
                <th style="text-align:center" width="50%">Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $u)
            <tr>
                <th style="text-align:center">{{$u->id}}</th>
                <th style="text-align:center">{{$u->name}}</th>
                <th style="text-align:center">{{$u->email}}</th>
                <th style="text-align:center">{{$u->trangthai}}</th>
                <th style="text-align:center">{{$u->level}}</th>
                <form action="{{route('user.destroy', $u->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td style="text-align:center">
                        <a href="{{route('user.edit', $u->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="">
    {{$user->appends(request()->all())->links()}}
</div>
@endsection