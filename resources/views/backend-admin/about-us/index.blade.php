@extends('backend-admin.layouts.main_dashboard')
@section('title', 'About Us Edit')
@section('content')
    <div id="about-us" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header about-us-title">เกี่ยวกับเรา</div>

                    <div class="card-body">

                        @if(\Session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                                {{\Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form  method="POST" action="{{ route('about-us.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-12 col-form-label text-md-left" >หัวข้อ</label>

                                <div class="col-md-4">
                                    <input id="title"  type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                           value="{{ array_get($about,'0.title') == null? old('title') : array_get($about,'0.title') }}" >

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-12 col-form-label text-md-left" >คำอธิบาย</label>

                                <div class="col-md-12">
                                    <textarea rows="3" id="description" placeholder="คำอธิบายเกี่ยวกับเรา"  type="text" class="form-control ckeditor {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              name="description"  >{{ array_get($about,'0.description') == null? old('description') : array_get($about,'0.description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">

                                    <label class="col-md-12 col-form-label text-md-left" >รูปเกี่ยวกับเรา</label>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                <span style="color:red">*</span> กรุณาใส่รูปภาพที่ 1
                                            </small>
                                            <div id="divShowImg">

                                                <img  class="rounded" id="previewProduct1" style="width: 160px; height: 130px"
                                                      src="{{ array_get($about,'0.image1') == null? 'https://via.placeholder.com/180x120.png?text=No%20Image' : asset('storage/'.array_get($about,'0.image1'))  }}">

                                                <div class="py-1"><input class="btn btn-warning" type="button" value="Clear" onclick="clearProduct1({{ count($about)}})"></div>
                                            </div>

                                            <input type="file" accept="image/jpeg, image/png"  onchange="readProduct1(this);" id="fileProduct1" name="image1">
                                        </div>
                                        @if ($errors->has('image1'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                                <strong>{{ $errors->first('image1') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                <span style="color:red">*</span> กรุณาใส่รูปภาพที่ 2
                                            </small>
                                            <div id="divShowImg">
                                                <img class="rounded" id="previewProduct2" style="width: 160px; height: 130px" src="{{ array_get($about,'0.image2') == null? 'https://via.placeholder.com/180x120.png?text=No%20Image' : asset('storage/'.array_get($about,'0.image2'))  }}">

                                                <div class="py-1"><input class="btn btn-warning" type="button" value="Clear" onclick="clearProduct2({{ count($about)}})"></div>
                                            </div>

                                            <input class="" type="file" accept="image/jpeg, image/png"  onchange="readProduct2(this);" id="fileProduct2" name="image2">
                                        </div>
                                        @if ($errors->has('image2'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                                <strong>{{ $errors->first('image2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                <span style="color:red">*</span> กรุณาใส่รูปภาพที่ 3
                                            </small>
                                            <div id="divShowImg">
                                                <img class="rounded" id="previewProduct3" style="width: 160px; height: 130px" src="{{ array_get($about,'0.image3') == null? 'https://via.placeholder.com/180x120.png?text=No%20Image' : asset('storage/'.array_get($about,'0.image3'))  }}">

                                                <div class="py-1"><input class="btn btn-warning" type="button" value="Clear" onclick="clearProduct3({{ count($about)}})"></div>
                                            </div>

                                            <input class="" type="file" accept="image/jpeg, image/png"  onchange="readProduct3(this);" id="fileProduct3" name="image3">
                                        </div>
                                        @if ($errors->has('image3'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                                <strong>{{ $errors->first('image3') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                <span style="color:red">*</span> กรุณาใส่รูปภาพที่ 4
                                            </small>
                                            <div id="divShowImg">
                                                <img class="rounded" id="previewProduct4" style="width: 160px; height: 130px" src="{{ array_get($about,'0.image4') == null? 'https://via.placeholder.com/180x120.png?text=No%20Image' : asset('storage/'.array_get($about,'0.image4'))  }}">

                                                <div class="py-1"><input class="btn btn-warning" type="button" value="Clear" onclick="clearProduct4({{ count($about)}})"></div>
                                            </div>

                                            <input class="" type="file" accept="image/jpeg, image/png"  onchange="readProduct4(this);" id="fileProduct4" name="image4">

                                        </div>

                                        @if ($errors->has('image4'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                                <strong>{{ $errors->first('image4') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                <span style="color:red">*</span> กรุณาใส่รูปภาพที่ 5
                                            </small>
                                            <div id="divShowImg">
                                                <img class="rounded" id="previewProduct5" style="width: 160px; height: 130px" src="{{ array_get($about,'0.image5') == null? 'https://via.placeholder.com/180x120.png?text=No%20Image' : asset('storage/'.array_get($about,'0.image5'))  }}">

                                                <div class="py-1"><input class="btn btn-warning" type="button" value="Clear" onclick="clearProduct5({{ count($about)}})"></div>
                                            </div>

                                            <input class="" type="file" accept="image/jpeg, image/png"  onchange="readProduct5(this);" id="fileProduct5" name="image5">
                                        </div>
                                        @if ($errors->has('image5'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                                <strong>{{ $errors->first('image5') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                <span style="color:red">*</span> กรุณาใส่รูปภาพที่ 6
                                            </small>
                                            <div id="divShowImg">
                                                <img class="rounded" id="previewProduct6" style="width: 160px; height: 130px" src="{{ array_get($about,'0.image6') == null? 'https://via.placeholder.com/180x120.png?text=No%20Image' : asset('storage/'.array_get($about,'0.image6'))  }}">

                                                <div class="py-1"><input class="btn btn-warning" type="button" value="Clear" onclick="clearProduct6({{ count($about)}})"></div>
                                            </div>

                                            <input class="" type="file" accept="image/jpeg, image/png"  onchange="readProduct6(this);" id="fileProduct6" name="image6">
                                        </div>
                                        @if ($errors->has('image6'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                                <strong>{{ $errors->first('image6') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <p class="col-md-7 col-form-label text-md-left  help-block py-2" style="font-size: 14px;">
                                        ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น ขนาดไฟล์ไม่เกิน 1 MB ขนาดภาพ 800 x 600
                                    </p>
                                </div>
                            </div>

                            <input type="hidden" value="{{ array_get($about,'0.id') }}" name="id">

                            <div class="form-group row mb-0" style="margin-top: 30px">
                                <div class="col-md-3 offset-md-5">
                                    <a class="btn btn-danger" href="{{route('employee.home')}}" >กลับ</a>
                                    <input type="submit" value="บันทึก" class="btn btn-success">
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

        function readProduct1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct1(check1) {
            var image = check1;
            if (image == 0)
            {
                $('#previewProduct1').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else
            {
                $('#previewProduct1').attr('src', "{{ asset('storage/'.array_get($about,'0.image1')) }}");
            }
            $('#fileProduct1').val(null);
        }

        function readProduct2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct2(check2) {
            var image = check2;
            if (image == 0) {
                $('#previewProduct2').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct2').attr('src', "{{ asset('storage/'.array_get($about,'0.image2')) }}");
            }
            $('#fileProduct2').val(null);
        }

        function readProduct3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct3(check3) {
            var image = check3;
            if (image == 0) {
                $('#previewProduct3').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct3').attr('src', "{{ asset('storage/'.array_get($about,'0.image3')) }}");
            }
            $('#fileProduct3').val(null);
        }

        function readProduct4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct4').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct4(check4) {
            var image = check1;
            if (image == 0) {
                $('#previewProduct4').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct4').attr('src', "{{ asset('storage/'.array_get($about,'0.image4')) }}");
            }
            $('#fileProduct4').val(null);
        }

        function readProduct5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct5').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct5(check5) {
            var image = check1;
            if (image == 0) {
                $('#previewProduct5').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct5').attr('src', "{{ asset('storage/'.array_get($about,'0.image5')) }}");
            }
            $('#fileProduct5').val(null);
        }

        function readProduct6(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct6').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct6(check1) {
            var image = check1;
            if (image == 0) {
                $('#previewProduct6').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct6').attr('src', "{{ asset('storage/'.array_get($about,'0.image6')) }}");
            }
            $('#fileProduct6').val(null);
        }

    </script>
@endpush
