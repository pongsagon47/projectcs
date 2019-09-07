@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Edit News')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(45deg, #219d1c, #bdff33); font-size: 19.5px;">ข่าวสาร</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('news.update',[$article->id])}}" style="padding: 1.3rem" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="title"  style="font-size: 16.8px;" >หัวข้อข่าว</label>

                                    <div >
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $article->title }}" >

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
                                                    {{ ($article->news_category_id == $news_category->id) ? 'selected' : '' }}>
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
                                        <input id="short_description" type="text" class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}" name="short_description" value="{{ $article->short_description }}" >

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

                                    <textarea rows="3" id="description"  placeholder="คำอธิบายเกี่ยวกับเรา" type="text" class="form-control ckeditor {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{ $article->description }}</textarea>

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
                                <label>รูปโปร์ไฟล์</label>
                                <div class="form-group">
                                    <div id="thumbnail-image">
                                        <a id="linkProduct"
                                           href="{{ ($article->thumbnail_image == 'NULL') ? '' : asset('storage/'.$article->thumbnail_image) }}"
                                           target="blank">
                                            <img class="rounded" id="previewProduct"
                                                 src="{{ ($article->thumbnail_image == 'NULL') ? 'https://via.placeholder.com/180x120.png?text=No%20Image'
                                     : asset('storage/'.$article->thumbnail_image) }}">
                                        </a>

                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            <span style="color:red">*</span> กรุณาใส่รูปภาพ
                                        </small>

                                        <input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct()">

                                        @if ($errors->has('image'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <input  type="file" accept="image/jpeg, image/png" onchange="readProduct(this);" id="fileProduct"
                                        name="thumbnail_image">
                                <p class="help-block" style="font-size: 14px">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น ขนาดไฟล์ไม่เกิน 1 MB
                                </p>
                            </div>

                            <div class="form-group">
                                <label>รูปโปร์ไฟล์</label>
                                <div class="form-group">
                                    <div id="cover-image">
                                        <a id="linkProduct1"
                                           href="{{ ($article->cover_image == 'NULL') ? '' : asset('storage/'.$article->cover_image) }}"
                                           target="blank">
                                            <img class="rounded" id="previewProduct1"
                                                 src="{{ ($article->cover_image == 'NULL') ? 'https://via.placeholder.com/180x120.png?text=No%20Image'
                                     : asset('storage/'.$article->cover_image) }}">
                                        </a>

                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            <span style="color:red">*</span> กรุณาใส่รูปภาพ
                                        </small>

                                        <input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct1()">

                                        @if ($errors->has('image'))
                                            <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <input  type="file" accept="image/jpeg, image/png" onchange="readProduct1(this);" id="fileProduct1"
                                        name="cover_image">
                                <p class="help-block" style="font-size: 14px">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น ขนาดไฟล์ไม่เกิน 1 MB
                                </p>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="status"  style="font-size: 16.8px;" >สถานะ</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="DRAFT" {{ ($article->status == 'DRAFT') ? 'selected' : '' }}>แบบร่าง</option>
                                        <option value="PUBLISHED" {{ ($article->status == 'PUBLISHED') ? 'selected' : '' }}>เผยแพร่</option>
                                    </select>
                                </div>
                            </div>


                            <div style="margin-top: 40px">
                                <input type="submit" value="บันทึก" class="btn btn-primary  btn-block">
                            </div>
                            <hr>
                            <div class="text-center">
                                <a  href="{{route('news.index')}}" style="font-size: 16px">กลับไปหน้ารายการขนม</a>
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

        function clearProduct1() {
            var image = '{{ $article->thumbnail_image }}';
            if (image == 'NULL') {
                $('#previewProduct1').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct1').attr('src', "{{ asset('storage/'.$article->thumbnail_image) }}");
                $('#linkProduct1').attr('href', "{{ asset('storage/'.$article->thumbnail_image) }}");
            }
            $('#fileProduct1').val(null);
        }

        function readProduct1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#falseinput').attr('src', e.target.result);
                    $('#previewProduct1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $('#linkProduct1').removeAttr('href');
            }
        }

        function clearProduct() {
            var image = '{{ $article->cover_image }}';
            if (image == 'NULL') {
                $('#previewProduct').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            }
            else {
                $('#previewProduct').attr('src', "{{ asset('storage/'.$article->cover_image) }}");
                $('#linkProduct').attr('href', "{{ asset('storage/'.$article->cover_image) }}");
            }
            $('#fileProduct').val(null);
        }
    </script>
@endpush

