@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Dessert Maker')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">รายละเอียดรายงานการผลิตขนม</h1>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="form-row ">
                            <div class="col-md-12">

                                <h3 class="text-center"><i class="fas fa-shopping-cart"></i> รายการผลิตขนมทั้งหมด</h3>
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
                                                <th  scope="row">{{ $id }}</th>
                                                <td >{{ $orderDetail->products->name }}</td>
                                                <td >{{ $orderDetail->total}} ชิ้น</td>

                                                <?php
                                                $total_qty += $orderDetail->total;
                                                $id++ ;
                                                ?>
                                                @endforeach
                                            </tr>
                                            <tr >
                                                <th width="300"><br>จำนวนขนมทั้งหมด</th>
                                                <td></td>
                                                <td> <br> {{$total_qty}} &nbsp; ชิ้น</td>
                                            </tr>
                                            </tbody>
                                    </table>
                                    <hr>
                                    <div class="text-center" style="padding-top: 9px">
                                        <a  href="#"  onclick="history.go(-1)" >&laquo; กลับหน้ารายงานการผลิต</a>
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

