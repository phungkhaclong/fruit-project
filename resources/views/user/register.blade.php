@extends('layouts.site')
@section('main')

@if(count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $err)
    <p>{{$err}}</p>
    @endforeach
</div>
@endif
<div class="container    register">
    <div class="jumbotron text-center" >
        <div class="col-md-12 col-md-offset-2">
            <form class="form-horizontal" method="post" role="from">
                {{ csrf_field() }}
                <div class="form-group text-center">
                    <div class="col-sm-10 reg-icon">
                        <span class="fa fa-user fa-3x">Đăng ký tài khoản</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" name="repassword" class="form-control" id="InputPassword1" placeholder="Xác nhận Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 ">
                        <button type="submit" class="btn btn-success ">
                            <span class="glyphicon glyphicon-share-alt"></span>
                            Đăng ký
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('user.carousel_img.show')

@stop()