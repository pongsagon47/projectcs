@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Admin Edit Employee')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"  style="font-size: 18px;background: rgb(100,223,46);color: aliceblue;">แก้ไขข้อมูลพนักงาน</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('employee.update',[array_get($data,'id')]) }}" enctype="multipart/form-data" style="padding: 1.3rem">
                            @csrf


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

                            <div class="form-group">
                                <label for="email" class=" col-form-label text-md-right"
                                       style="font-size: 16.8px;">G-mail</label>

                                <div>
                                    <input id="email" type="text"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                           value="{{array_get($data,'email') }}">

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณากรอกท Gmail ห้ถูกต้อง
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
                                        <input class="form-check-input"
                                               type="radio" name="gender" id="male" {{ ('ชาย' == $data->gender) ? 'checked' : '' }} value="ชาย">
                                        <label class="form-check-label" for="male">ชาย</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio" name="gender" id="female" {{ ('หญิง' == $data->gender) ? 'checked' : '' }} value="หญิง">
                                        <label class="form-check-label" for="female">หญิง</label>
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
                                           value="{{array_get($data,'id_card') }}">

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
                                               name="nickname" value="{{array_get($data,'nickname') }}">

                                        @if ($errors->has('nickname'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="username" class="col-form-label text-md-right" style="font-size: 16.8px;">ชื่อผู้ใช้</label>

                                    <div>
                                        <input id="username" type="text" onkeypress="checkUsername(event)"
                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                               name="username" value="{{array_get($data,'username') }}">

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
                                        <input id="password" type="password" onkeypress="checkUsername(event)"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password">

                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            <span style="color:red">*</span> กรุณากรอกเป็นภาษาอังกฤษ และตัวเลข
                                        </small>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password-confirm" class=" col-form-label text-md-right"
                                           style="font-size: 16.8px;">ยืนยันรหัสผ่าน </label>

                                    <div>
                                        <input id="password-confirm" onkeypress="checkUsername(event)" type="password"
                                               class="form-control" name="password_confirmation">

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
                                           value="{{array_get($data,'address') }}">

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

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="phone_number" class=" col-form-label text-md-right" style="font-size: 16.8px;">เบอร์โทรศัพท์</label>

                                    <div>
                                        <input id="phone_number" type="text"
                                               class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                               name="phone_number" value="{{array_get($data,'phone_number') }}">

                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-4">

                                    <label for="role_employee_id" class=" col-form-label text-md-right">ตำแหน่ง</label>

                                    <select id="role_employee_id"
                                            class="form-control{{ $errors->has('role_employee_id') ? ' is-invalid' : '' }}"
                                            name="role_employee_id" style="margin-top: 0.5px">
                                        <option selected disabled>เลือก...</option>
                                        <option  {{ ('2' == $data->role_employee_id) ? 'selected' : '' }} value="2">พนักงานแผนกออเดอร์</option>
                                        <option  {{ ('3' == $data->role_employee_id) ? 'selected' : '' }} value="3">หัวหน้าห้องขนมไทย</option>
                                        <option  {{ ('4' == $data->role_employee_id) ? 'selected' : '' }} value="4">หัวหน้าห้องขนมโรล</option>
                                        <option  {{ ('5' == $data->role_employee_id) ? 'selected' : '' }} value="5">หัวหน้าห้องขนมเค้ก</option>
                                        <option  {{ ('6' == $data->role_employee_id) ? 'selected' : '' }} value="6">หหัวหน้าห้องขนมคุกกี้</option>
                                        <option  {{ ('7' == $data->role_employee_id) ? 'selected' : '' }} value="7">พนักงานแผนกส่งของ</option>
                                    </select>

                                    @if ($errors->has('role_employee_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_employee_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div style="margin-top: 40px";>
                                <input type="submit" value="บันทึก" class="btn btn-primary  btn-block">
                            </div>
                            <hr>
                            <div class="text-center">
                                <a  href="{{route('employee.index')}}" style="font-size: 15px">Back to Employee list</a>
                            </div>

                            {{method_field('PUT')}}
                        </form>

                    </div>
                </div>

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
                    $('#falseinput').attr('src', e.target.result);
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

            if (x >= 0 && x <= 47) {
                event.preventDefault();
                return false;

            } else if (x >= 58 && x <= 64) {
                event.preventDefault();
                return false;

            } else if (x >= 91 && x <= 96) {
                event.preventDefault();
                return false;

            } else if (x > 122) {
                event.preventDefault();
                return false;

            }
        }

        var cleave = new Cleave('#phone_number', {
            phone: true,
            delimiter: '-',
            phoneRegionCode: 'TH',
        });

        new Cleave('#id_card', {
            blocks: [1, 4, 5, 2, 1],
            numericOnly: true,
        });
    </script>
@endpush
