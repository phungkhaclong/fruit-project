@extends('admin.admin_layout')
@section('contentt')
<div class="content">
    <div class="card-body">
        <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label>Tiêu đề </label>
                        <input type="text" class="form-control" name="Tieude" placeholder="Tên Tiêu đề">
                    </div>
                </div>
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label>Nội dung </label>
                        <textarea style="height: 200px;" type="text" class="form-control " name="Noidung" placeholder="Nội Dung"></textarea>
                    </div>
                </div>

                <div class="col-md-8 pr-1">
                    <div class="custom-file">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image_news" id="ful" class="custom-file-input" />
                    </div>
                    <div class="form-group">
                        <img id="imgPre" src="{{asset('image/noimage.jpg')}}" alt="no img" class="img-thumbnail" />
                        <p>
                            <label class="custom-file-label" for="ful"><i><u><b>Choose File</b></u></i></label>
                        </p>
                    </div>

                </div>
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng Thái</label>
                        <input type="text" name="TrangThai" class="form-control" placeholder="Trạng thái">
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Thêm</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection