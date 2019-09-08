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
                    <th>เวลาที่สั่งซื้อ</th>
                    <th>รายละเอียด</th>
                </tr>
                </thead>
                @if(count($arr_orders) != 0)
                    @foreach( $arr_orders as $order)
                        <tbody style="font-size: 14px ; color: #110100">
                        <tr>
                            <td>{{ $order['order_id'] }}</td>
                            <td>{{ $order['shop_name'] }}</td>
                            <td>{{ $order['user_type'] }}</td>
                            <td width="120">{{ $order['total_qty']}} ชิ้น</td>
                            <td width="300"> {{ date('เวลา H:i น. วันที่ d/m/Y',strtotime($order['created_at'])) }}</td>
                            <td>
                                <a href="{{route('brownie-dessert.show',[$order['order_id']])}}" class="btn btn-success " title="Confirm Record" >
                                    <i class="far fa-eye"> รายละเอียด</i>
                                </a>
                            </td>

                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center"  colspan="6"> วันนี้ยังไม่มีรายการสั่งซื้อ </td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>
    </div>
@endsection


