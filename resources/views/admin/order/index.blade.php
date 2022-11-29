@extends('admin.admin_layout')
@section('contentt')

<h2>Danh sách hóa đơn</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th> ID</th>
            <th style="text-align:center" width="5%">User_ID</th>
            <th style="text-align:center" width="20%">Họ Tên</th>
            <th style="text-align:center" width="10%">SĐT</th>
            <th style="text-align:center" width="30%">Địa Chỉ</th>
            <th style="text-align:center" width="15%">Trạng thái</th>
            <th style="text-align:center" width="50%">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hoadon as $hoa)
        <tr>

            <th style="text-align:center">{{$hoa->id}}</th>
            <th style="text-align:center">{{$hoa->user_id}}</th>
            <th style="text-align:center">{{$hoa->hoten}}</th>
            <th style="text-align:center">{{$hoa->sdt}}</th>
            <th style="text-align:center">{{$hoa->diachi}}</th>
            <th style="text-align:center">{{$hoa->trangthai}}</th>
            <form action="{{route('order.destroy', $hoa->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td style="text-align:center">
                    <a href="{{route('admin.order.orderdetail', $hoa->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="{{route('order.edit', $hoa->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    @if($hoa->trangthai=='Đã đặt')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                    @else
                    <button type="submit" onclick="return confirm('Bạn có muốn khôi phục?')" class="btn  btn-danger"><i class="fa fa-trash"></i></button>
                    @endif
                </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="">
    {{$hoadon->appends(request()->all())->links()}}
</div>

@endsection