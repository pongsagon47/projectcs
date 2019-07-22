@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Create Product')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #d9fdb7; font-size: 19.5px;">เพิ่มขนม</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}" style="padding: 1.3rem" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="name"  style="font-size: 16.8px;" >ชื่อขนม</label>

                                    <div >
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" >

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="price"  style="font-size: 16.8px;" >ราคาขนม</label>

                                    <div >
                                        <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" >

                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="product_category_id"  style="font-size: 16.8px;" >ประเภทขนม</label>

                                    <select id="product_category_id" class="form-control{{ $errors->has('product_category_id') ? ' is-invalid' : '' }}" name="product_category_id" >
                                        <option selected disabled>เลือก...</option>
                                        @foreach( $product_categories as $product_category)
                                            <option value="{{ $product_category->id }}"
                                                {{ (old("product_category_id") == $product_category->id) ? 'selected' : '' }}>
                                                {{ $product_category->title }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('product_category_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label >รูปขนม</label>
                                <div class="form-group">
                                    <div id="divShowImg">
                                        <img  id="previewProduct" style="width: 280px;height: 220px" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                                    </div>

                                    <div style="margin-left: 15rem;margin-top: 20px"><input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct()"></div>

                                    @if ($errors->has('image'))
                                        <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <input type="file" accept="image/jpeg, image/png"  onchange="readProduct(this);" id="fileProduct"
                                       name="image">
                                <p class="help-block py-2" style="font-size: 14px;">
                                    ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                                    ขนาดไฟล์ไม่เกิน 1 MB <br>
                                </p>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">

                                    <label for="description" class="col-form-label text-md-right" style="font-size: 16.8px;">คำอธิบายขนม</label>

                                    <input id="description"  type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"              >

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>


                            <div style="margin-top: 40px";>
                                <input type="submit" value="บันทึก" class="btn btn-primary  btn-block">
                            </div>
                            <hr>
                            <div class="text-center">
                                <a  href="{{route('login.employee')}}" style="font-size: 16px">กลับไปหน้ารายการขนม</a>
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
    </script>
@endpush

