@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Employee Profile')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="row ">
            <div class="col-md-12">

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header" style="text-align: center; font-size: 19px">
                                    โปรไฟล์
                                </div>
                                <div class="card-body">

                                    <a style="padding-left: 57rem" href="{{route('emp.edit')}}">Edit Profile</a>

                                    <div class="row justify-content-center">

                                        <div class="col-md-12">

                                            <img class=" rounded-circle" style="width: 210px ; height: 210px;margin-top: 35px;margin-left: 24rem" src="{{asset('storage/'.Auth::user()->image)}}" alt="">

                                            <p style="margin-top: 17px">
                                                <strong style="margin-left: 27rem;">ชื่อผู้ใช้ : </strong>{{Auth::user()->username}} <br>
                                                <strong style="margin-left: 26.5rem;">ตำแหน่ง : </strong> {{$data->role_employee->name}} <br><br>
                                                <strong style="margin-left: 17.5rem;">ชื่อ : </strong>{{Auth::user()->first_name}}  <strong style="padding-left: 8rem">นามสกุล : </strong>{{Auth::user()->last_name}} <br>
                                                <strong style="margin-left: 17.5rem;">ชื่อเล่น : </strong>{{Auth::user()->nickname}}  <strong style="padding-left: 50px">เพศ : </strong>{{Auth::user()->gender}} <strong style="padding-left: 50px">เบอร์โทรศัพท์ : </strong>{{Auth::user()->phone_number}} <br>
                                                <strong style="margin-left: 17.5rem;">เลขบัตรประจำตัวประชาชน : </strong>{{Auth::user()->id_card}}  <strong style="padding-left: 2rem">ชื่อร้าน : </strong>{{Auth::user()->shop_name}} <br>
                                                <strong style="margin-left: 17.5rem;">ที่อยู่ : </strong>{{Auth::user()->address}} <br>


                                            </p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div style="margin-top: 60px ; margin-left: 56rem">
                                <a href="{{route('employee.home')}}" class="btn btn-primary"> back </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



