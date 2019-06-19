@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Show Product')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">

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

                                        @if($data->image == null)
                                            <img class="center rounded-circle" style="width: 190px ; height: 180px;margin-top: 35px" src="https://via.placeholder.com/180x120.png?text=No%20Image" alt="">

                                        @else
                                            <img class="center rounded-circle" style="width: 200px ; height: 180px;margin-top: 35px" src="{{asset('storage/'.$data->image)}}" alt="">
                                        @endif

                                    </div>

                                    <div class="col-md-12 text-center" style="margin-top: 20px">

                                        <label><strong>ชื่อสินค้า: </strong> {{$data->name}}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                        <label><strong>ราคา: </strong> {{$data->price}}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                        <label><strong>ชื่อประเภทสินค้า: </strong> {{$data->product_category->title}}</label>

                                    </div>


                                    <div class="col-md-12 text-center">

                                        <label><strong>รายระเอียดสินค้า: </strong> {{ $data->description }}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                            <label><strong>เพิ่มสินค้า: </strong> {{ $data->created_at }}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                            <label><strong>อัพเดตสินค้า: </strong> {{ $data->updated_at }}</label>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="link-right" style="margin-top: 22px ">
                    <a href="{{route('product.index')}}" class="btn btn-primary "> back </a>
                </div>

            </div>
        </div>
    </div>

@endsection
