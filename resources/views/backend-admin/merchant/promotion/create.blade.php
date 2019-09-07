@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Create Promotion')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"
                         style="background: linear-gradient(45deg, #219d1c, #bdff33); font-size: 19.5px; ">
                        เพิ่มโปรโมชั่น
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('promotion.store')}}">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-7">
                                    <label for="promotion_name">ชื่อโปรโมชั่น</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('promotion_name') ? ' is-invalid' : '' }}"
                                           value="{{ old('promotion_name') }}" id="promotion_name" name="promotion_name"
                                           placeholder="Promotion name">

                                    @if ($errors->has('promotion_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('promotion_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <small id="promotion_name" class="form-text text-muted" style="margin-left: 6px">
                                    <span style="color:red">*</span> ถ้าคุณใส่ชื่อโปรโมชั่นตรงกับประเภทลูกค้า ส่วนลดนี้จะถูกใช้ตรงกับประเภทลูกค้าทันทีในหน้า ยืนยันรายการสั่งซื้อ
                                </small>

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="promotion_description">คำอธิบายโปรโมชั่น</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('promotion_description') ? ' is-invalid' : '' }}"
                                           value="{{ old('promotion_description') }}" id="promotion_description"
                                           name="promotion_description" placeholder="Description">

                                    @if ($errors->has('promotion_description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('promotion_description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group ">
                                <div class="col-md-2">
                                    <label for="promotion_discount">ส่วนลด</label>
                                    <input type="number"
                                           class="form-control {{ $errors->has('promotion_discount') ? ' is-invalid' : '' }}"
                                           value="{{ old('promotion_discount') }}" id="promotion_discount" name="promotion_discount">
                                    <small id="promotion_name" class="form-text text-muted">
                                        ส่วนลดจะเป็น %
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    @if ($errors->has('promotion_discount'))
                                        <strong style="color: rgba(179,0,0,0.9);font-size: 13px">{{ $errors->first('promotion_discount') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center py-3">
                                    <a href="{{route('promotion.index')}}" class="btn btn-danger">กลับ</a>
                                    <button type="submit" class="btn btn-success">บันทึก</button>
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
        $("#promotion_discount").on("keypress", function (evt) {
            var keycode = evt.charCode || evt.keyCode;
            if (keycode == 46 || this.value.length == 2) {
                return false;
            }
        });
    </script>
@endpush


