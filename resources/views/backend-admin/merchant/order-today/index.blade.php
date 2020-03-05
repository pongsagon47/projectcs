@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Order Check Today')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-shopping-cart"></i> รายการสั่งซื้อวันนี้</h1>

        </div>

        @if(\Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{\Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(\Session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{\Session::get('deleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white">
                <thead style="font-size: 14px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33)">
                <tr>
                    <th>ID</th>
                    <th>ชื่อร้าน</th>
                    <th>ประเภทลูกค้า</th>
                    <th>จำนวนรวม</th>
                    <th>สถานะรายการสั่งซื้อ</th>
                    <th>สถานะการชำระเงิน</th>
                    <th>เวลาที่สั่งซื้อ</th>
                    <th>รายละเอียดและยืนยัน</th>
                </tr>
                </thead>
                @if(count($orders) != 0)
                @foreach( $orders as $order)
                    <tbody style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->shop_name }}</td>
                        <td>{{ $order->user->role->name }}</td>
                        <td width="120">{{ $order->total_qty }} ชิ้น</td>
                        @if($order->order_status == 0)
                            <td width="160"><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่อนุมัติ</span></td>
                        @elseif($order->order_status == 1)
                            <td width="160"><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >รอชำระค่ามัดจำ</span></td>
                        @elseif($order->order_status == 2)
                            <td width="160"><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >รับรายการสั่งซื้อ</span></td>
                        @elseif($order->order_status == 3)
                            <td width="160"><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                        @elseif($order->order_status == 4)
                            <td width="160"><span class="badge badge-pill  badge-primary" style="color: white;font-size: 13px" >กำลังดำเนินการจัดส่ง</span></td>
                        @endif
                        @if($order->payment_status == 0)
                            <td width="180"><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่ชำระเงิน</span></td>
                        @elseif($order->payment_status == 1)
                            <td width="180"><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >ตรวจสอบการชำระเงินค่ามัดจำ</span></td>
                        @elseif($order->payment_status == 2)
                            <td width="180"><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >ชำระค่ามัดจำเรียบร้อย</span></td>
                        @elseif($order->payment_status == 3)
                            <td width="180"><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >ตรวจสอบการชำระเงินรายกาาสั้งซื้อ</span></td>
                        @elseif($order->payment_status == 4)
                            <td width="180"><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >ชำระรายการสั่งซื้อเรียบร้อย</span></td>
                        @endif
                        <td>{{ date('เวลา H:i น.',strtotime($order->created_at)) }}</td>
                        <td>
                            @if($order->payment_status == 3)
                            <a href="{{route('order-today.proof',[$order->id])}}" class="btn-sm btn btn-info "><i class="fas fa-edit"> หลักฐานการชำระรายการสั่งซื้อ</i></a>
                            @endif
                            <a href="{{route('order-today.show',[$order->id])}}" class="btn btn-sm btn-success " title="Confirm Record" >
                                <i class="far fa-eye"> รายละเอียด </i>
                            </a>
                        </td>

                    </tr>
                    </tbody>
                @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center"  colspan="7"> วันนี้ยังไม่มีรายการสั่งซื้อ </td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>
        <div class="flex-center">
            {{ $orders->render() }}
        </div>

    </div>
@endsection


