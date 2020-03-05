@extends('backend-admin.layouts.main_dashboard')
@section('title', 'About user Today')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header" style="text-align: center; font-size: 19px;color: #110100; background: linear-gradient(45deg, #219d1c, #bdff33);">
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
                                    <div class="col-md-12 text-center" >
                                        <label><strong>ชื่อร้าน:</strong> {{$data->shop_name}}</label>
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
                <div>

            </div>
            <div class="py-3 text-center">
                <a class="btn btn-primary" href="{{route('delivery.bill',[$data->id])}}" >&laquo; กลับหน้ายืนยันการส่งสินค้า</a>
            </div>
        </div>
    </div>

@endsection



