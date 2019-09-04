@extends('layouts.login')

@section('title','USER LOGIN')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="{{asset('img/login.jpg')}}" style="height: 550px; width: 450px;background-position: center; background-size: cover;" ></div>
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4" style="margin-top: 35px">ยินดีต้อนรับ</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}" style="margin-top: 40px;">

                                        @csrf

                                        <div class="form-group">
                                            <input id="username" onkeypress="checkUsername(event)" type="text" class="form-control form-control-user{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username">

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="padding-left: 30px">{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input id="password" onkeypress="checkUsername(event)" type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="padding-left: 30px">{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>

                                        <input type="submit" value=" Login" class="btn btn-warning btn-user btn-block">
                                    </form>

                                    <hr>

                                    <div class="text-center" style="margin-top: 30px;">
                                        <a style="font-size: 15px;"  href="/">กลับหน้าหลัก</a>
                                        &nbsp; &nbsp;
                                        <a style="font-size: 15px;" href="{{route('register')}}">สมัครสมาชิก</a>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 14px;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

{{--<div class="container ">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-7">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header" style="background-color: #d9fdb7; font-size: 19.5px; " >เข้าสู่ระบบ</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="username" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">ชื่อผู้ใช้</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="username" onkeypress="checkUsername(event)" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" >--}}

                                {{--@if ($errors->has('username'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('username') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">รหัสผ่าน</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" onkeypress="checkUsername(event)" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" >--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" style="font-size: 14.5px;" for="remember">--}}
                                        {{--จำรหัสผ่าน--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<input type="submit" value="ล็อกอิน" class="btn btn-success">--}}



                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
@push('script')
<script>

    function checkUsername(event) {
        var x = event.which || event.keyCode;
        console.log(x)

        if (x >= 0 && x <=12)
        {
            event.preventDefault();
            return  false;

        }else if (x >= 14 && x <= 47){
            event.preventDefault();
            return  false;

        }else if (x >= 58 && x <= 64){
            event.preventDefault();
            return  false;

        }else if (x >= 91 && x <= 96){
            event.preventDefault();
            return  false;

        }else if (x >122){
            event.preventDefault();
            return  false;

        }
    }

</script>
@endpush
