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
                                    <strong> ชื่อผู้สั่งซื้อ : </strong> {{ Auth::user()->first_name." ".Auth::user()->last_name}}
                                    <strong> ชื่อร้าน : </strong> {{ Auth::user()->shop_name}}
                                </p>

                                @if(\Session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{\Session::get('error')}}
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

                                        @if(count($order_Details) != 0 )
                                        <?php $id = 1 ?>
                                        @foreach( $order_Details as $orderDetail)
                                            <tbody>
                                            <tr>
                                                <th width="120" scope="row">{{ $id }}</th>
                                                <td >{{ $orderDetail['product_name'] }}</td>
                                                <td >{{ $orderDetail['product_price'] }} </td>
                                                <td >{{ $orderDetail['product_qty'] }}</td>
                                                <td >{{ $orderDetail['product_total_price'] }}</td>
                                            </tr>
                                            <?php $id++ ?>
                                            @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5">ไม่มีการสั่งรายการขนม</td>
                                                </tr>
                                            @endif
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

                                <form class="success_form" method="post" action="{{route('shop.store')}}">
                                    @csrf

                                    <?php $i = 0 ?>
                                    @foreach ($order_Details as $order_Detail)

                                        @foreach ($order_Detail as $key => $value)

                                            <input type="hidden" name="{{$i}}[{{$key }}]" value="{{$value}}">

                                        @endforeach
                                        <?php $i++ ?>
                                    @endforeach
                                    <div class="text-center" style="padding-top: 14px">
                                        <a class="btn btn-danger" href="#" onclick="history.go(-1)">&laquo; กลับ</a>
                                        <button id="submit" type="submit" title="ยืนยันรายการสั่งซื้อ" class="btn btn-success" {{count($order_Details) == 0 ?"disabled":""}} >ยืนยันรายการสั่งซื้อ  &raquo;</button>
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


