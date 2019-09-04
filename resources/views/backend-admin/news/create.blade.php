@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Create News')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(45deg, #219d1c, #bdff33); font-size: 19.5px;">ข่าวสาร</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('news.store') }}" style="padding: 1.3rem" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="title"  style="font-size: 16.8px;" >หัวข้อข่าว</label>

                                    <div >
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" >

                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            <span style="color:red">*</span> กรุณากรอกหัวข้อข่าว
                                        </small>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="news_category_id"  style="font-size: 16.8px;" >หมวดหมู่</label>

                                    <select id="news_category_id" class="form-control{{ $errors->has('news_category_id') ? ' is-invalid' : '' }}" name="news_category_id" >
                                        <option selected disabled>เลือก...</option>
                                        @foreach( $news_categories as $news_category)
                                            <option value="{{ $news_category->id }}"
                                                    {{ (old("news_category_id") == $news_category->id) ? 'selected' : '' }}>
                                                {{ $news_category->name }}</option>
                                        @endforeach
                                    </select>

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณาเลือกหมวกหมู่
                                    </small>

                                    @if ($errors->has('news_category_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('news_category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="short_description"  style="font-size: 16.8px;" >บทนำ</label>

                                    <div >
                                        <input id="short_description" type="text" class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}" name="short_description" value="{{ old('short_description') }}" >

                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            <span style="color:red">*</span> กรุณากรอกบทนำ
                                        </small>

                                        @if ($errors->has('short_description'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">

                                    <label for="description" class="col-form-label text-md-right" style="font-size: 16.8px;">เนื้อหา</label>

                                    <textarea rows="3" id="description"  placeholder="คำอธิบายเกี่ยวกับเรา" type="text" class="form-control ckeditor {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" ></textarea>

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณากรอกเนื้อหา
                                    </small>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <label >รูปแบบย่อ</label>
                                <div class="form-group">
                                    <div id="thumbnail-image">
                                        <img  class="rounded" id="previewProduct" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณาใส่รูปภาพ
                                    </small>

                                    <input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct()">

                                    @if ($errors->has('thumbnail_image'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('thumbnail_image') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <input type="file" accept="image/jpeg, image/png"  onchange="readProduct(this);" id="fileProduct"
                                       name="thumbnail_image">
                                <p class="help-block py-2" style="font-size: 14px;">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น ขนาดไฟล์ไม่เกิน 1 MB <br>
                                </p>

                            </div>

                            <div class="form-group">
                                <label >รูปหน้าปก</label>
                                <div class="form-group">
                                    <div id="cover-image">
                                        <img  class="rounded" id="previewProduct1" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <span style="color:red">*</span> กรุณาใส่รูปภาพ
                                    </small>

                                  <input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct1()">

                                    @if ($errors->has('cover_image'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <input type="file" accept="image/jpeg, image/png"  onchange="readProduct1(this);" id="fileProduct1"
                                       name="cover_image">

                                <p class="help-block py-2" style="font-size: 14px;">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น ขนาดไฟล์ไม่เกิน 1 MB <br>
                                </p>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="status"  style="font-size: 16.8px;" >สถานะ</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="DRAFT" {{ (old("status") == 'DRAFT') ? 'selected' : '' }}>แบบร่าง</option>
                                        <option value="PUBLISHED" {{ (old("status") == 'PUBLISHED') ? 'selected' : '' }}>เผยแพร่</option>
                                    </select>
                                </div>
                            </div>


                            <div style="margin-top: 40px">
                                <input type="submit" value="บันทึก" class="btn btn-primary  btn-block">
                            </div>
                            <hr>
                            <div class="text-center">
                                <a  href="{{route('product.index')}}" style="font-size: 16px">กลับไปหน้ารายการขนม</a>
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

        function readProduct(input) {
            if (input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct() {
            $('#previewProduct').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            $('#fileProduct').val(null);
        }

        function readProduct1(input) {
            if (input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct1() {
            $('#previewProduct1').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            $('#fileProduct1').val(null);
        }
    </script>
@endpush

