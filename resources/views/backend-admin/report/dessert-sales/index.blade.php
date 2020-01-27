@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Sales revenue')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">รายงานขนมที่มียอดขายมากที่สุดและน้อยที่สุด</h1>
        </div>
        <div class="table-responsive" style="margin-top: 25px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="font-size: 15px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33);">
                <tr>
                    <th>#</th>
                    <th>ชื่อขนม</th>
{{--                    <th>ประเภทห้องขนม</th>--}}
                    <th>จำนวนการผลิตขนมรวม</th>
                    <th>ราคารวม</th>
                </tr>
                </thead>
                <?php $id = 1  ?>
                @foreach( $orderDetails as $orderDetail)
                <tbody style="font-size: 14px ; color: #110100">
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{$orderDetail->products->name}}</td>
                    <td>{{$orderDetail->total_qty}}</td>
                    <td>{{$orderDetail->total_price}}</td>
                </tr>
                </tbody>
                    <?php $id++; ?>
                @endforeach

            </table>
        </div>
    </div>


    <!-- /.container-fluid -->
@endsection
