@extends('backend-admin.layouts.main_dashboard')
@section('title','Employee Detail')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header" style="text-align: center; font-size: 19px">
                    ข้อมูลพนักงาน
                </div>

                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-md-11">

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <label><strong>ชื่อผู้ใช้:</strong> {{$data->username}}</label>

                                </div>

                                <div class="col-md-3">
                                    <label><strong>ชื่อ:</strong> {{$data->first_name}}</label>
                                </div>

                                <div class="col-md-4">

                                    <label><strong>นามสกุล:</strong> {{$data->last_name}}</label>
                                </div>

                                <div class="col-md-5 ">

                                    <label><strong>ชื่อเล่น: </strong> {{$data->nickname}}</label>
                                </div>

                                <div class="col-md-3">

                                    <label><strong>ตำแหน่ง: </strong> {{$data->role_employee->name}}</label>
                                </div>

                                <div class="col-md-4">

                                    <label><strong>เพศ: </strong> {{ null == $data->gender ?"ไม่ระบุเพศ": $data->gender }} </label>
                                </div>

                                <div class="col-md-5">

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
            <div style="margin-top: 60px ; margin-left: 56rem">
                <a href="{{route('employee.index')}}" class="btn btn-primary"> back </a>
            </div>

        </div>
    </div>
</div>


@endsection
