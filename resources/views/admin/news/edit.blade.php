@extends('admin.admin_layout')
@section('contentt')
<div class="content">
    <div class="card-body">
        <form action="{{route('news.update',$tintuc->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label>Tiêu đề </label>
                        <input type="text" class="form-control" name="Tieude" value="{{$tintuc->Tieude}}">
                    </div>
                </div>
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea type="text" style="height:300px ;" class="form-control" name="Noidung">{{$tintuc->Noidung}}
                        </textarea>
                    </div>
                </div>
                <div class="col-md-8 pr-1">
                    <div class="custom-file">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image_news" id="ful" class="custom-file-input" />
                    </div>
                    <div class="form-group">
                        <img id="imgPre" src="{{asset('image/'.$tintuc->image)}}" alt="no img" class="img-thumbnail" />
                        <p>
                            <label class="custom-file-label" for="ful"><i><u><b>Choose File</b></u></i></label>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng Thái</label>
                        <input type="text" name="TrangThai" class="form-control" value="{{$tintuc->TrangThai}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
        </form>
    </div>
</div>
@endsection