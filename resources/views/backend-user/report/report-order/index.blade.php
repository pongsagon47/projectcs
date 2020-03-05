@extends('backend-user.layouts.main_dashboard')
@section('title', 'shop')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">รายงานรายการสั่งซื้อทั้งหมด</h1>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white">
                        <thead style="font-size: 14px; color: #fffdfd; background: linear-gradient(45deg, #ff9913, #ffe764)">
                        <tr>
                            <th>ID</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>ราคารวม</th>
                            <th>จำนวนสินค้า</th>
                            <th>ส่วนลด</th>
                            <th width="180">ราคารวมหักส่วนลด</th>
                            <th>ใบเสร็จรายการสั่งซื้อ</th>
                        </tr>
                        </thead>
                        @if( count($orders) != 0)
                            @foreach( $orders as $order)
                                <tbody style="font-size: 14px ; color: #110100">
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ date('d/m/Y  เวลา H:i น.',strtotime($order->created_at)) }}</td>
                                    <td>{{ $order->total_qty }}</td>
                                    <td>{{ number_format($order->total_price ,2) }}</td>
                                    <td>{{ $order->promotion->promotion_discount }} %</td>
                                    <td>{{ number_format($order->total_price_discounted ,2) }}</td>
                                    <td width="270">
                                        <a href="{{route('report-order.bill',[$order->id])}}" class="btn btn-info" title="Order Detail" >
                                            <i class="fas fa-wallet"></i> ใบเสร็จ และ รายระเอียด
                                        </a>

                                    </td>

                                </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tbody style="font-size: 17px ; color: #110100">
                            <tr>
                                <td class="text-center"  colspan="7"> ไม่มีรายงานการสั่งซื้อ </td>
                            </tr>
                            </tbody>
                        @endif

                    </table>
                </div>

            </div>
        </div>
    </div>


@endsection

