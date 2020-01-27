@extends('backend-user.layouts.main_dashboard')
@section('title', 'Bill Order')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">ใบเสร็จรายการขนม</h1>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="form-row ">
                            <div class="col-md-12">

                                <h3 class="text-center"><i class="fas fa-shopping-cart"></i> ใบเสร็จรายการขนม</h3>
                                <p style="padding-top: 40px;font-size: 16px">
                                    <strong> ชื่อผู้สั่งซื้อ : </strong> {{ $order->user->first_name." ".$order->user->last_name}} &nbsp;
                                    <strong><i class="fas fa-store"></i></strong> {{ $order->user->shop_name}} <br>
                                    <strong> ประเภทลูกค้า : </strong> {{ $order->user->role->name}} <br>
                                    <strong> พนักงานที่รับรายการสั่งซื้อ : </strong> {{ $order->employee->first_name." ".$order->employee->last_name}} &nbsp;
                                    <strong><i class="fas fa-phone-square-alt"></i></strong>  {{ $order->employee->phone_number}} <br>
                                    <strong> ตำแหน่ง : </strong> {{ $order->employee->role_employee->name}} &nbsp;&nbsp;
                                    <strong><i class="fas fa-envelope"></i></strong> {{ $order->employee->email}} <br>
                                </p>

                                @if(\Session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{\Session::get('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(\Session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{\Session::get('success')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="table-responsive" style="margin-top: 30px">
                                    <table class="table" style="color: #000;text-align: center;">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">รวมเป็นเงิน</th>

                                        </tr>
                                        </thead>

                                        <?php $id = 1 ?>
                                        @foreach( $orderDetails as $orderDetail)
                                            <tbody>
                                            <tr>
                                                <th width="120" scope="row">{{ $id }}</th>
                                                <td >{{ $orderDetail->products->name }}</td>
                                                <td >{{ $orderDetail->products->price }} </td>
                                                <td >{{ $orderDetail['product_qty'] }}</td>
                                                <td >{{ $orderDetail['product_total_price'] }}</td>

                                                <?php $id++ ?>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="row">สินค้าทั้งหมด</th>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    {{ $order->total_qty}} ชิ้น
                                                    @if($order->promotion_id != null)
                                                    <br><br>
                                                    ส่วนลด {{$order->promotion->promotion_discount}} %
                                                    @endif
                                                </td>
                                                <td>
                                                   ราคารวม &nbsp; {{ $order->total_price }} บาท
                                                    @if($order->promotion_id != null)
                                                        <br><br>
                                                        ลด {{ $order->total_price - $order->total_price_discounted}} บาท
                                                    @endif
                                                    @if($order->total_price_discounted != null)
                                                    <br><br>
                                                    เหลือ {{ $order->total_price_discounted }} บาท
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                    </table>
                                    <hr>
                                    <div class="text-center">
                                        <a href="{{route('report-order.index')}}">กลับไปหน้ารายงานการสั่งซื้อ</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

