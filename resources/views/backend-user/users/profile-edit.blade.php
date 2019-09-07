@extends('backend-user.layouts.main_dashboard')
@section('title', 'User Edit Profile')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="row ">
            <div class="col-md-12">

                <form method="POST" action="{{route('users.update')}}" enctype="multipart/form-data" style="padding: 2rem">
                    @csrf

                    @if(\Session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{\Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name" style="font-size: 16.8px;">ชื่อ</label>

                            <div>
                                <input id="first_name" type="text"
                                       class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                       name="first_name" value="{{ array_get($data,'first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name" style="font-size: 16.8px;">นามสกุล </label>

                            <div>
                                <input id="last_name" type="text"
                                       class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                       name="last_name" value="{{array_get($data,'last_name') }}">

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

                            <div>
                                <input id="shop_name" type="text"
                                       class="form-control{{ $errors->has('shop_name') ? ' is-invalid' : '' }}"
                                       name="shop_name" value="{{ array_get($data,'shop_name') }}">

                                @if ($errors->has('shop_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shop_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($data->role_id == 1)

                            <div class="form-group col-md-4">
                                <label for="role_id" class=" col-form-label text-md-right">ประเภทลูกค้า</label>
                                <select id="role_id"
                                        class="form-control{{ $errors->has('role_type_id') ? ' is-invalid' : '' }}"
                                        name="role_id" required>
                                    <option selected disabled>เลือก...</option>
                                    <option {{ ('1' == $data->role_id) ? 'selected' : '' }} value="1">ร้านสาขา</option>
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                        @else

                            <div class="form-group col-md-4">
                                <label for="role_id" class=" col-form-label text-md-right">ประเภทลูกค้า</label>
                                <select id="role_id"
                                        class="form-control{{ $errors->has('role_type_id') ? ' is-invalid' : '' }}"
                                        name="role_id" required>
                                    <option selected disabled>เลือก...</option>
                                    <option {{ ('2' == $data->role_id) ? 'selected' : '' }} value="2">ร้านเฟรนไชน์</option>
                                    <option {{ ('3' == $data->role_id) ? 'selected' : '' }} value="3">ร้านที่รับไปขาย</option>
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group col-md-3">
                            <label for="phone_number" class=" col-form-label text-md-right" style="font-size: 16.8px;">เบอร์โทรศัพท์</label>

                            <div>
                                <input id="phone_number" type="text"
                                       class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                       name="phone_number" value="{{ array_get($data,'phone_number') }}">

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="email" class=" col-form-label text-md-right"
                               style="font-size: 16.8px;">G-mail่</label>

                        <div>
                            <input id="email" type="text"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ array_get($data,'email') }}">

                            <small id="passwordHelpBlock" class="form-text text-muted">
                                <span style="color:red">*</span> กรุณากรอกที่อยู่ให้ถูกต้อง
                            </small>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class=" col-form-label text-md-right" style="font-size: 16.8px;">เพศ</label>

                        <div>
                            <div class="form-check form-check-inline" style="margin-left: 18px">
                                <input class="form-check-input" type="radio" name="gender" id="male" {{ ('ชาย' == $data->gender) ? 'checked' : '' }} value="ชาย">
                                <label class="form-check-label" for="male">ชาย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="gender" id="female" {{ ('หญิง' == $data->gender) ? 'checked' : '' }} value="หญิง">
                                <label class="form-check-label " for="female">หญิง</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>รูปโปร์ไฟล์</label>
                        <div class="form-group">
                            <div id="divShowImg">
                                <a id="linkProduct"
                                   href="{{ ($data->image == 'NULL') ? '' : asset('storage/'.$data->image) }}"
                                   target="blank">
                                    <img class="rounded-circle" id="previewProduct" style="width: 160px;height: 160px"
                                         src="{{ ($data->image == 'NULL') ? 'https://via.placeholder.com/180x120.png?text=No%20Image'
                                     : asset('storage/'.$data->image) }}">
                                </a>
                                <div style="margin-left: 8rem"><input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct()"></div>

                                @if ($errors->has('image'))
                                    <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                @endif

                            </div>
                        </div>
                        <input  type="file" accept="image/jpeg, image/png" onchange="readProduct(this);" id="fileProduct"
                                name="image">
                        <p class="help-block" style="font-size: 14px">
                            ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                            ขนาดไฟล์ไม่เกิน 1 MB <br>
                        </p>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-9">

                            <label for="id_card" class="col-form-label text-md-right" style="font-size: 16.8px;">บัตรประจำตัวประชาชน</label>

                            <input id="id_card" type="text"
                                   class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}" name="id_card"
                                   value="{{ array_get($data,'id_card') }}">

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
                                <input id="nickname" type="text"
                                       class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}"
                                       name="nickname" value="{{ array_get($data,'nickname') }}">

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
                                <input id="username" onkeypress="checkUsername(event)" type="text" maxlength="40"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username" value="{{ array_get($data,'username') }}">

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
                            <label for="password" class=" col-form-label text-md-right" style="font-size: 16.8px;">รหัสผ่าน</label>

                            <div>
                                <input id="password" onkeypress="checkUsername(event)" maxlength="20" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password">

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
                            <label for="password-confirm" class=" col-form-label text-md-right"
                                   style="font-size: 16.8px;">ยืนยันรหัสผ่าน </label>

                            <div>
                                <input id="password-confirm" onkeypress="checkUsername(event)" maxlength="20"
                                       type="password" class="form-control" name="password_confirmation">

                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    <span style="color:red">*</span> กรุณากรอกรหัสผ่านให้ตรงกัน
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class=" col-form-label text-md-right"
                               style="font-size: 16.8px;">ที่อยู่</label>

                        <div>
                            <input id="address" type="text"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                   value="{{ array_get($data,'address') }}">

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

                    <input type="submit" value="บันทึก" class="btn btn-primary btn-user btn-block">

                    <hr>
                    <div class="text-center">
                        <a style="font-size: 15px" href="{{route('users.show')}}">Back to Profile</a>
                    </div>


                    {{method_field('PUT')}}
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>

    function readProduct(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#previewProduct').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#linkProduct').removeAttr('href');
        }
    }

    function clearProduct() {
        var image = '{{ $data->image }}';
        if (image == 'NULL') {
            $('#previewProduct').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
        }
        else {
            $('#previewProduct').attr('src', "{{ asset('storage/'.$data->image) }}");
            $('#linkProduct').attr('href', "{{ asset('storage/'.$data->image) }}");
        }
        $('#fileProduct').val(null);
    }

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

