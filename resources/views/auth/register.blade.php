@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #d9fdb7; font-size: 19.5px;">ลงทะเบียน</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name"  style="font-size: 16.8px;" >ชื่อ</label>

                                <div >
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" >

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" style="font-size: 16.8px;" >นามสกุล </label>

                                <div >
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" >

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-5">

                                <label for="shop_name" class=" col-form-label text-md-right">ชื่อร้าน</label>

                                <div >
                                    <input id="shop_name" type="text" class="form-control{{ $errors->has('shop_name') ? ' is-invalid' : '' }}" name="shop_name" value="{{ old('shop_name') }}" >

                                    @if ($errors->has('shop_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shop_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="role_type_id"  class=" col-form-label text-md-right">ประเภทลูกค้า</label>
                                <select id="role_type_id" class="form-control{{ $errors->has('role_type_id') ? ' is-invalid' : '' }}" name="role_type_id" required>
                                    <option selected disabled >เลือก...</option >
                                    <option value="2" >ร้านเฟรนไชน์</option >
                                    <option value="3" >ร้านที่รับไปขาย</option >
                                </select>
                                @if ($errors->has('role_type_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_type_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3">
                                <label for="phone_number"  class=" col-form-label text-md-right" style="font-size: 16.8px;">เบอร์โทรศัพท์</label>

                                <div>
                                    <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" >

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="gender" class=" col-form-label text-md-right" style="font-size: 16.8px;" >เพศ</label>

                            <div>
                                <div class="form-check form-check-inline" style="margin-left: 18px">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="ชาย" >
                                    <label class="form-check-label" for="male">ชาย</label>
                                </div>
                                <div class="form-check form-check-inline" >
                                    <input class="form-check-input " type="radio" name="gender" id="female" value="หญฺิง" >
                                    <label class="form-check-label " for="female">หญิง</label>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-9">

                                <label for="id_card" class="col-form-label text-md-right" style="font-size: 16.8px;">บัตรประจำตัวประชาชน</label>

                                <input id="id_card"  type="text" class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}" name="id_card" value="{{ old('id_card') }}">

                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    <span style="color:red">*</span> กรุณากรอกให้ครบ 13 หลัก
                                </small>

                                @if ($errors->has('id_card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_card') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3">

                                <label for="nickname" class="col-form-label text-md-right" style="font-size: 16.8px;">ชื่อเล่น</label>

                                <div>
                                    <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}" >

                                    @if ($errors->has('nickname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="username" class="col-form-label text-md-right" style="font-size: 16.8px;">ชื่อผู้ใช้</label>

                                <div>
                                    <input id="username" onkeypress="checkUsername(event)" type="text" maxlength="40" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" >

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณากรอกเป็นภาษาอังกฤษ และตัวเลข
                                    </small>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="password" class=" col-form-label text-md-right" style="font-size: 16.8px;" >รหัสผ่าน</label>

                                <div>
                                    <input id="password" onkeypress="checkUsername(event)" maxlength="20" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณากรอกเป็นภาษาอังกฤษ และตัวเลข เท่านั้น
                                    </small>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password-confirm" class=" col-form-label text-md-right" style="font-size: 16.8px;" >ยืนยันรหัสผ่าน </label>

                                <div >
                                    <input id="password-confirm" onkeypress="checkUsername(event)" maxlength="20" type="password" class="form-control" name="password_confirmation" >

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณากรอกรหัสผ่านให้ตรงกัน
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class=" col-form-label text-md-right" style="font-size: 16.8px;" >ที่อยู่</label>

                            <div>
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" >

                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    <span style="color:red">*</span> กรุณากรอกที่อยู่ให้ถูกต้อง
                                </small>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-top: 30px; margin-left: 30px" >
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" style="font-size: 16px;">ลงทะเบียน</button>

                                <a class="btn btn-danger" href="{{url('/')}}" style="margin-left: 5px">กลับไปหน้าหลัก</a>
                            </div>
                        </div>
                    </form>
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

            if (x >= 0 && x <=47)
            {
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

        new Cleave('#phone_number', {
            phone: true,
            delimiter: '-',
            phoneRegionCode: 'TH'
        });

        new Cleave('#id_card', {
            blocks: [1, 4, 5, 2, 1],
            numericOnly: true,
        });
    </script>
@endpush

