@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Edit News Category')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="background-color: #d9fdb7; font-size: 19.5px; " >หมวดหมู่ข่าวสาร</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('news-category.update',[$data->id]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">หมวดหมู่</label>

                                <div class="col-md-6">
                                    <input id="name"  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $data->name }}" >

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right" style="font-size: 17px;">หมวดหมู่</label>

                                <div class="col-md-6">
                                    <input id="slug"  type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $data->slug }}" >

                                    @if ($errors->has('slug'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="margin-top: 30px">
                                <div class="col-md-8 offset-md-4">
                                    <a class="btn btn-danger" href="{{route('news-category.index')}}" style="margin-right: 10px">กลับ</a>
                                    <input type="submit" value="บันทึก" class="btn btn-success">
                                </div>
                            </div>
                            {{method_field('PUT')}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

