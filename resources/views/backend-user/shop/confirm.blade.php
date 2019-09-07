@extends('backend-user.layouts.main_dashboard')
@section('title', 'Order Confirm')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">ยืนยันรายการสั่งซื้อ</h1>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="form-row ">
                            <div class="col-md-12">

                                <h3 class="text-center"><i class="fas fa-shopping-cart"></i> รายการสั่งซื้อ</h3>
                                <p style="padding-top: 15px">
                                    <strong> ชื่อผู้สั่งซื้อ : </strong> {{ Auth::user()->shop_name}}
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

                                <div class="table-responsive">
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
                                        @foreach( $order_Details as $orderDetail)
                                            <tbody>
                                            <tr>
                                                <th width="120" scope="row">{{ $id }}</th>
                                                <td >{{ $orderDetail['product_name'] }}</td>
                                                <td >{{ $orderDetail['product_price'] }} </td>
                                                <td >{{ $orderDetail['product_qty'] }}</td>
                                                <td >{{ $orderDetail['product_total_price'] }}</td>

                                                <?php $id++ ?>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="row">สินค้าทั้งหมด</th>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $sum_qty}} ชิ้น</td>
                                                <td>{{ $sum_price }} บาท</td>

                                            </tr>
                                            </tbody>
                                    </table>

                                </div>

                                <form method="post" action="{{route('shop.store')}}">
                                    @csrf

                                    <?php $i = 0 ?>
                                    @foreach ($order_Details as $order_Detail)

                                        @foreach ($order_Detail as $key => $value)

                                            <input type="hidden" name="{{$i}}[{{$key }}]" value="{{$value}}">

                                        @endforeach
                                        <?php $i++ ?>
                                    @endforeach
                                    <div style="padding-top: 14px">
                                        <input type="submit" title="ยืนยันรายการสั่งซื้อ" class="btn btn-primary btn-block" value="ยืนยันรายการสั่งซื้อ">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

