@extends('backend-user.layouts.main_dashboard')
@section('title', 'User Profile')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <a class="link-right btn btn-sm btn-info"  href="{{route('users.edit')}}">Edit Profile</a> <br>

                <div class="card" style="margin-top: 20px">
                    <div class="card-header" style="text-align: center; font-size: 19px">
                        ข้อมูลลูกค้า
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-11">

                                <div class="form-group row" >

                                    <div class="col-md-12 ">

                                        <img class="center rounded-circle" style="width: 160px ; height: 160px;margin-top: 35px" src="{{asset('storage/'.$data->image)}}" alt="">

                                    </div>

                                    <div class="col-md-12 text-center" style="margin-top: 20px">

                                        <label><strong>ชื่อผู้ใช้:</strong> {{$data->username}}</label>

                                    </div>

                                    <div class="form-group row" style="margin-left: 30px;margin-top: 30px">

                                        <div class="col-md-4">
                                            <label><strong>ชื่อ:</strong> {{$data->first_name}}</label>
                                        </div>

                                        <div class="col-md-4">

                                            <label><strong>นามสกุล:</strong> {{$data->last_name}}</label>
                                        </div>

                                        <div class="col-md-4">

                                            <label><strong>ชื่อเล่น: </strong> {{$data->nickname}}</label>
                                        </div>

                                        <div class="col-md-4">

                                            <label><strong>ประเภทลูกค้า: </strong> {{$data->role->name}}</label>

                                        </div>

                                        <div class="col-md-4">

                                            <label><strong>เพศ: </strong> {{ null == $data->gender ?"ไม่ระบุเพศ": $data->gender }} </label>

                                        </div>

                                        <div class="col-md-12">

                                            <label><strong>เลขบัตรประจำตัวประชาชน: </strong> {{$data->id_card}}</label>
                                        </div>

                                        <div class="col-md-12">

                                            <label><strong>G-mail: </strong> {{$data->email}}</label>

                                        </div>

                                        <div class="col-md-12">

                                            <label><strong>เบอร์โทรศัพท์: </strong> {{$data->phone_number}}</label>

                                        </div>

                                        <div class="col-md-12">

                                            <label><strong>ที่อยู่: </strong> {{$data->address}}</label>

                                        </div>

                                        <div class="col-md-12">

                                            <label><strong>Active: </strong> {{1 == $data->status ? 'Yes' : 'No'}}</label>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="link-right" style="margin-top: 30px ">
                    <a href="{{route('user.index')}}" class="btn btn-primary "> back </a>
                </div>

            </div>
        </div>
    </div>
    {{--<!-- Begin Page Content -->--}}
    {{--<div class="container">--}}
        {{--<div class="row ">--}}
            {{--<div class="col-md-12">--}}

                {{--<div class="container-fluid">--}}
                    {{--<div class="row justify-content-center">--}}
                        {{--<div class="col-md-12">--}}

                            {{--<div class="card">--}}
                                {{--<div class="card-header" style="text-align: center; font-size: 19px">--}}
                                    {{--โปรไฟล์--}}
                                {{--</div>--}}
                                {{--<div class="card-body">--}}

                                    {{--<a style="padding-left: 57rem" href="{{route('users.edit')}}">Edit Profile</a>--}}

                                    {{--<div class="row justify-content-center">--}}

                                        {{--<div class="col-md-12">--}}

                                            {{--<img class=" rounded-circle" style="width: 210px ; height: 210px;margin-top: 35px;margin-left: 24rem" src="{{asset('storage/'.Auth::user()->image)}}" alt="">--}}

                                            {{--<p style="margin-top: 17px">--}}
                                                {{--<strong style="margin-left: 27rem;">ชื่อผู้ใช้ : </strong>{{Auth::user()->username}} <br>--}}
                                                {{--<strong style="margin-left: 25rem;">ประเภทลูกค้า: </strong> {{$data->role->name}} <br><br>--}}
                                                {{--<strong style="margin-left: 17.5rem;">ชื่อ : </strong>{{Auth::user()->first_name}}  <strong style="padding-left: 8rem">นามสกุล : </strong>{{Auth::user()->last_name}} <br>--}}
                                                {{--<strong style="margin-left: 17.5rem;">ชื่อเล่น : </strong>{{Auth::user()->nickname}}  <strong style="padding-left: 50px">เพศ : </strong>{{Auth::user()->gender}} <strong style="padding-left: 50px">เบอร์โทรศัพท์ : </strong>{{Auth::user()->phone_number}} <br>--}}
                                                {{--<strong style="margin-left: 17.5rem;">เลขบัตรประจำตัวประชาชน : </strong>{{Auth::user()->id_card}}  <strong style="padding-left: 2rem">ชื่อร้าน : </strong>{{Auth::user()->shop_name}} <br>--}}
                                                {{--<strong style="margin-left: 17.5rem;">ที่อยู่ : </strong>{{Auth::user()->address}} <br>--}}


                                            {{--</p>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div style="margin-top: 60px ; margin-left: 56rem">--}}
                                {{--<a href="{{route('home')}}" class="btn btn-primary"> back </a>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection



