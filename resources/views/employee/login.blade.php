@extends('employee.layouts.main')

@section('title','USER LOGIN')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" style="background-color: #d9fdb7; font-size: 19.5px; " >พนักงาน</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login.employee') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">ชื่อผู้ใช้</label>

                                <div class="col-md-6">
                                    <input id="username" onkeypress="checkUsername(event)" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" >

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">รหัสผ่าน</label>

                                <div class="col-md-6">
                                    <input id="password" onkeypress="checkUsername(event)" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" style="font-size: 14.5px;" for="remember">
                                            จำรหัสผ่าน
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <input type="submit" value="ล็อกอิน" class="btn btn-success">

                                    <a class="btn btn-link" href="{{ route('emp.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                    </a>

                                </div>
                            </div>
                        </form>

                        <a class="btn btn-link" style="font-size: 16px;" href="{{ route('register.employee') }}">{{ __('สมัครสมาชิค') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
