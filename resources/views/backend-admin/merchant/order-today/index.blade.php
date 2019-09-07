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
                    <th>ราคารวม</th>
                    <th>ราคารวมหักส่วนลด</th>
                    <th>ส่วนลด</th>
                    <th>เวลาที่สั่งซื้อ</th>
                    <th>ยืนยันรายการสั่งซื้อ</th>
                </tr>
                </thead>
                @foreach( $orders as $order)
                    <tbody style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->shop_name }}</td>
                        <td>{{ $order->user->role->name }}</td>
                        <td width="120">{{ $order->total_qty }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td width="200">{{ $order->total_price_discounted }}</td>
                        <td>{{ $order->promotion->promotion_discount }}%</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{route('order-confirm.confirm',[$order->id])}}" class="btn btn-success " title="Confirm Record" >
                                <i class="far fa-eye"> รายละเอียด</i>
                            </a>
                        </td>

                    </tr>
                    </tbody>
                @endforeach

            </table>
        </div>
        <div class="flex-center">
            {{ $orders->render() }}
        </div>

    </div>
@endsection


