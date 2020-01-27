@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Sales revenue')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">รายงานสาขาที่มียอดสั่งขนมมากที่สุดน้อยที่สุด</h1>
        </div>
        <div class="table-responsive" style="margin-top: 25px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="font-size: 15px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33);">
                <tr>
                    <th>ID</th>
                    <th>ชื่อร้าน</th>
                    <th>ประเภทลูกค้า</th>
                    <th>จำนวนการสั่งขนมรวม</th>
                    <th>ราคารวม</th>
                </tr>
                </thead>
                <?php $id = 1 ?>
                @if(count($orders) != 0)
                    @foreach( $orders as $order)
                        <tbody style="font-size: 14px ; color: #110100">
                        <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $order->user->shop_name }}</td>
                            <td>{{ $order->user->role->name }}</td>
                            <td width="120">{{ $order->total_qty }} ชิ้น</td>
                            <td>{{ $order->total_price_discounted }} บาท</td>
                        </tr>
                        </tbody>
                        <?php $id++ ?>
                    @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center" colspan="5"> วันนี้ยังไม่มีรายการสั่งซื้อ</td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>
    </div>


@endsection