@extends('admin.admin_layout')
@section('contentt')
<h2>Danh sách tin tức</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th style="width: 250px; text-align: center;">Tiêu đề</th>
            <th style="width: 400px; text-align: center;">Nội dung</th>
            <th style="text-align:center">Ảnh</th>
            <th style="text-align:center">Trạng thái</th>
            <th style="width: 120px; text-align: center;" class="">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tintuc as $tin)
        <tr>
            <form action="{{route('news.destroy', $tin->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td style="text-align:center">{{$tin->id}}</td>
                <td style="text-align:center">{{$tin->Tieude}}</td>

                <td style="overflow: auto; display: flex;justify-content: space-around;height: 200px;"> {{$tin->Noidung}}
                </td>
                <td style="text-align:center"><img class="img-thumbnail" width="50%" src="{{asset('image/'.$tin->image)}}"></td>
                <td style="text-align:center">{{$tin->TrangThai}}</td>

                <td>
                    <a href="{{route('news.edit', $tin->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    @if($tin->TrangThai==1)
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
    {{$tintuc->appends(request()->all())->links()}}
</div>
@endsection