@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Create Product Category')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="background-color: #d9fdb7; font-size: 19.5px; " >เพิ่มประเภทขนม</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('product_category.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">ประเภทขนม</label>

                                <div class="col-md-6">
                                    <input id="title"  type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" >

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="margin-top: 30px">
                                <div class="col-md-8 offset-md-4">
                                    <a class="btn btn-danger" href="{{route('product_category.index')}}" style="margin-right: 10px">กลับ</a>
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

