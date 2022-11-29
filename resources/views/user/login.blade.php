@extends('layouts.site')
@section('main')
<div class="container">
    @if (session('status'))
    <ul>
        <li class="text-success"> {{ session('status') }}</li>
    </ul>
    @endif
    <div class="container login_page">
        <div class="jumbotron text-center" style="min-height:400px;height:auto;">
            <div class="col-md-12 col-md-offset-2">
                <form class="form-horizontal" method="post" role="from">
                    {{ csrf_field() }}
                    <div class="form-group text-center">
                        <div class="col-sm-10 reg-icon">
                            <span class="fa fa-user fa-3x">Đăng nhập tài khoản</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">

                            <input type="email" name="txtEmail" class="form-control" id="InputEmail" placeholder="Nhập email...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="password" name="txtPassword" class="form-control" id="InputPassword" placeholder="nhập mật khẩu..">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-share-alt"></span>
                                Đăng nhập
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-10 text_login_page">
                        <p>Nếu bạn chưa có tài khoản ? Hãy bấm
                            <button class="btn btn-success">
                                <a href="{{route('user.register')}}">
                                    Đăng ký
                                </a>
                            </button> ngay!
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <ul class="list-login">
        <li>
            <h6>bạn có thể đăng nhập bằng
                <a href="{{url('user/logingoogle')}}"><img width="7%" style="background: #fff;" src="{{url('../site')}}/img/google.png" alt=""></a>
            </h6>
        </li>
    </ul> -->

</div>
@include('user.carousel_img.show')
@stop()