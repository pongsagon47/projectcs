@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Employee Profile')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <a class="link-right btn btn-sm btn-info"  href="{{route('emp.edit')}}">Edit Profile</a> <br>

                <div class="card" style="margin-top: 20px">
                    <div class="card-header" style="text-align: center; font-size: 19px">
                        ข้อมูลพนักงาน
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="pull-right">

                                </div>



                                <div class="form-group row" >

                                    <div class="col-md-12 ">

                                        <img class="center rounded-circle" style="width: 150px ; height: 150px;margin-top: 35px" src="{{asset('storage/'.$data->image)}}" alt="">

                                    </div>

                                    <div class="col-md-12 text-center" style="margin-top: 20px">

                                        <label><strong>ชื่อผู้ใช้:</strong> {{$data->username}}</label>

                                    </div>

                                    <div class="col-md-12 text-center">

                                        <label><strong>ตำแหน่ง: </strong> {{$data->role_employee->name}}</label>

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

                                            <label><strong>เพศ: </strong> {{ null == $data->gender ?"ไม่ระบุเพศ": $data->gender }} </label>

                                        </div>

                                        <div class="col-md-8">

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

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="link-right" style="margin-top: 22px ">
                    <a href="{{route('employee.home')}}" class="btn btn-primary "> back </a>
                </div>

            </div>
        </div>
    </div>



@endsection



