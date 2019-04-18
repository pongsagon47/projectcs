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

                    <div class="form-group row">

                        <label>ชื่อผู้ใช้: {{$data->username}}</label>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>ชื่อ: {{$data->first_name}}</label>
                        </div>

                        <div class="col-md-4">

                            <label>นามสกุล: {{$data->last_name}}</label>
                        </div>

                        <div class="col-md-4">

                            <label>นามสกุล: {{$data->nickname}}</label>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-3">

                            <label>ตำแหน่ง: {{$data->role_employee->name}}</label>
                        </div>

                        <div class="col-md-4">

                            <label>เพศ: {{$data->gender}}</label>
                        </div>

                        <div class="col-md-5">

                            <label>เลขบัตรประจำตัวประชาชน: {{$data->id_card}}</label>
                        </div>

                    </div>

                    <div class="form-group row">

                        <label>G-mail: {{$data->email}}</label>

                    </div>

                    <div class="form-group row">

                        <label>เบอร์โทรศัพท์: {{$data->phone_number}}</label>

                    </div>

                    <div class="form-group row">

                        <label>ที่อยู่: {{$data->address}}</label>

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
