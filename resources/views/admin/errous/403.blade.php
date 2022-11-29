@extends('admin.admin_layout')

@section('contentt')
<div class="error-page">
    <h2 style="padding-right: 35px;" class="headline text-warning"> Chú ý</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Ô không! Bạn chưa có quyền để cho thư mục này.</h3>

        <p>
            Chúng tôi không thể tìm thấy trang bạn đang tìm kiếm. Trong khi đó, bạn có thể quay lại trang <a href="{{route('admin.layout.dashboard')}}"> dashboard</a> để tiếp tục.
        </p>

        <!-- <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            
        </form> -->
    </div>
    <!-- /.error-content -->
</div>
<!-- /.error-page -->
@endsection