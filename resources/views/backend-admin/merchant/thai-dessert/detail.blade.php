@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Order today detail')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">รายการขนม</h1>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="form-row ">
                            <div class="col-md-12">

                                <h3 class="text-center"><i class="fas fa-shopping-cart"></i> รายการสั่งซื้อของห้องขนมไทย</h3>
                                <p style="padding-top: 40px;font-size: 16px">
                                    <strong> ชื่อผู้สั่งซื้อ : </strong> {{ $order->user->first_name." ".$order->user->last_name}} &nbsp;
                                    <strong><i class="fas fa-store"></i></strong> {{ $order->user->shop_name}} &nbsp;
                                    <strong> ประเภทลูกค้า : </strong> {{ $order->user->role->name}} <br>
                                </p>

                                <div class="table-responsive" style="margin-top: 30px">
                                    <table class="table" style="color: #000;text-align: center;">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col">จำนวน</th>
                                        </tr>
                                        </thead>

                                        <?php
                                            $id = 1;
                                            $total_qty = 0;
                                        ?>
                                        @foreach( $orderDetails as $orderDetail)
                                            <tbody>
                                            <tr>
                                                <th width="120" scope="row">{{ $id }}</th>
                                                <td >{{ $orderDetail->products->name }}</td>
                                                <td >{{ $orderDetail->product_qty }} ชิ้น</td>

                                                <?php
                                                    $total_qty += $orderDetail->product_qty;
                                                    $id++ ;
                                                ?>
                                                @endforeach
                                            </tr>
                                            <tr >
                                                <th width="300" scope="row"><br>จำนวนสินค้าทั้งหมด</th>
                                                <td></td>
                                                <td> <br> {{$total_qty}} &nbsp; ชิ้น</td>
                                            </tr>

                                            </tbody>
                                    </table>
                                    <hr>
                                    <div class="text-center" style="padding-top: 9px">
                                        <form class="success_form" method="post" action="{{route('thai-dessert.success',[$order->id])}}">
                                            @csrf
                                            <a class="btn btn-danger" href="{{route('thai-dessert.index')}}" >&laquo; กลับไปหน้ารายการสั่งซื้อวันนี้</a>
                                            @if($order->productionStatus->thai_dessert == 1)
                                            <button type="submit" title="ยืนยันรายการสั่งซื้อ" class="btn btn-success" >รายการผลิตเสร็จสิ้น &raquo;</button>
                                            @endif
                                            {{method_field('PUT')}}
                                        </form>
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
@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.success_form').on('submit',function () {
                if(confirm("Are you sure?")){
                    return true;
                }
                else {
                    return false;
                }
            })
        })
    </script>
@endpush

