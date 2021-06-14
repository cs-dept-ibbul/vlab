@extends('layouts/main-login')
@section('content-body')
<div class="content row m-0 p-0">

    <div class="col-lg-12 m-0 p-0">
        <div class="pull-right p-3">
            <a href="/" class="font fs2 fw3 text-white mx-1">Home</a>
            <a href="/login" class="font fs2 fw3 text-white mx-1">Login</a>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mt-5">
        <h1 class="text-center text-white font2 fw6">&nbsp;</h1>
        <div class="login-left"></div>
    </div>
    <div class="col-lg-6 col-md-6 mt-5 pt-5">
        <div class="p-5 login-right">

            <div class="d-flex">

                <p class="font2 fs8 fw6 p-text-dark">Reset Password</p>
                <div id="login-msg" class="p-0 m-0 ml-4 p-display-none flex-wrap">
                    <span>Hi, this will only take a munite</span>
                    <span class="dot-flashing  ml-4"></span>
                </div>
                <div id="login-err" class="mt-3 ml-4 p-display-none">
                    <span class="alert alert-danger">Invalid username or password</span>
                </div>
                <div id="login-err2" class="mt-3 ml-4 p-display-none ">
                    <span class="alert alert-warning">No internet connection...</span>
                </div>
            </div>

            <form id="login-form" action="api/password/reset" method="POST">

                <input class="form-control my-3 h2 login-input" name="email" placeholder="Enter email" value="{{request()->get('email')}}">
                <input class="form-control my-3 h2 login-input" name="password" placeholder="Enter new password">
                <input class="form-control my-3 h2 login-input" name="password_confirmation" placeholder="Confirm new password">
                <input hidden name="token" placeholder="token" value="{{request()->get('token')}}">

                <button class="p-dark text-white font fs8 fw2 w-100 h2" type="submit">Reset</button>
            </form>

        </div>
    </div>
</div>
@endsection