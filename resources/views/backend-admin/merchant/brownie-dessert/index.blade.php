@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Brownies Dessert')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-shopping-cart"></i> ห้องขนมบราวนี้</h1>

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
                    <th>สถานะรายการผลิต</th>
                    <th>เวลาที่สั่งซื้อ</th>
                    <th>รายละเอียดและยืนยัน</th>
                </tr>
                </thead>
                @if(count($orders) != 0)
                    @foreach( $orders as $order)
                        @if($order->total_qty != 0)
                            <tbody style="font-size: 14px ; color: #110100">
                            <tr>
                                <td>{{ $order->id}}</td>
                                <td>{{ $order->user->shop_name }}</td>
                                <td>{{ $order->user->role->name }}</td>
                                <td width="120">{{ $order->total_qty}} ชิ้น</td>
                                @if($order->productionStatus->brownie_dessert == 0 )
                                    <td><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่รับรายการผลิต</span></td>
                                @elseif($order->productionStatus->brownie_dessert == 1 )
                                    <td><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                                @elseif($order->productionStatus->brownie_dessert == 2 )
                                    <td><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >การผลิตเสร็จสิ้น</span></td>
                                @endif
                                <td width="300"> {{ date('เวลา H:i น. วันที่ d/m/Y',strtotime($order->created_at)) }}</td>
                                <td>
                                    <form method="post" action="{{route('brownie-dessert.confirm',[$order->id])}}">
                                        @csrf

                                        <a href="{{route('brownie-dessert.show',[$order->id])}}" class="btn btn-info " title="Confirm Record" >
                                            <i class="far fa-eye"> รายละเอียด@if($order->productionStatus->brownie_dessert == 1) และ ยืนยันรายการผลิตเสร็จสิ้น @endif</i>
                                        </a>
                                        @if($order->productionStatus->brownie_dessert == 0)
                                        <button class="btn btn-success" type="submit"><i class="fas fa-cart-arrow-down"></i> รับรายการผลิต</button>
                                        @endif
                                        {{method_field('PUT')}}
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endif
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
    </div>
@endsection


