@extends('backend-user.layouts.main_dashboard')
@section('title', 'shop')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">ยืนยันการสั่งซื้อรายการขนม</h1>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="form-row ">
                            <div class="col-md-12">

                                <h3 class="text-center"> <i class="fas fa-shopping-cart"></i> รายการสั่งซื้อ</h3>
                                <h6>ชื่อผู้สั่งซื้อ : {{Auth::user()->first_name." ".Auth::user()->last_name}}</h6>
                                <table class="table" style="color: #000;">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ชื่อสินค้า</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">รวมเป็นเงิน</th>
                                    </tr>
                                    </thead>
                                    @foreach( $order_Details as $order_Detail)
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                            <td>{{ $order_Detail['product_name'] }}</td>
                                            <td>{{ $order_Detail['product_qty'] }} </td>
                                            <td>{{ $order_Detail['product_price'] }}</td>

                                    @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">สินค้าทั้งหมด</th>
                                        <td></td>
                                        <td>{{ $sum_qty }} ชิ้น</td>
                                        <td>{{ $sum_price }} บาท</td>
                                    </tr>
                                    </tbody>
                                </table >

                                <div class="text-center">
                                    <a href="javascript:history.go(-1)"  class="btn btn-danger center-block" title="Return to the previous page">&laquo; กลับ</a>
                                    <a href="#" style="color: white" class="btn btn-success center-block">ยืนยันการสั่งซื้อ &raquo;</a>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

