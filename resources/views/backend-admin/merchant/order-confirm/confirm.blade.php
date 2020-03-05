@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Confirm Order')
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
                                    <strong> ชื่อผู้สั่งซื้อ : </strong> {{ $order->user->first_name." ".$order->user->last_name}} &nbsp;&nbsp;
                                    <strong> ชื่อร้าน : </strong> {{ $order->user->shop_name}} &nbsp;
                                    <strong> ประเภทลูกค้า : </strong> {{ $order->user->role->name}}
                                    <strong style="padding-left: 30px"> เบอร์โทรศัพท์ : </strong> {{ $order->user->phone_number}}
                                </p>

                                @if(\Session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{\Session::get('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(\Session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{\Session::get('success')}}
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
                                            <th colspan="2">การจัดการ</th>

                                        </tr>
                                        </thead>

                                        <?php $id = 1 ?>
                                        @foreach( $orderDetails as $orderDetail)
                                            <tbody>
                                            <tr>
                                                <th width="150" scope="row">{{ $id }}</th>
                                                <td width="330">{{ $orderDetail->products->name }}</td>
                                                <td width="180">{{ $orderDetail->products->price }} </td>
                                                <form id="edit-form" method="post"
                                                      action="{{route('order-confirm.edit')}}">
                                                    <td width="120">

                                                        @csrf
                                                        <input width="120"  class="form-control"
                                                               type="number" name="product_qty"
                                                               value="{{ $orderDetail->product_qty }}" min="1" max="999">
                                                        <input type="hidden" name="product_price"
                                                               value="{{ $orderDetail->products->price }}">
                                                        <input type="hidden" name="product_total_price"
                                                               value="{{ $orderDetail->order->total_price }}">
                                                        <input type="hidden" name="total_qty"
                                                               value="{{ $orderDetail->order->total_qty }}">
                                                        <input type="hidden" name="orderDetail_id"
                                                               value="{{ $orderDetail->id }}">
                                                        <input type="hidden" name="order_id"
                                                               value="{{ $orderDetail->order->id }}">


                                                    </td>
                                                    <td width="180">{{ $orderDetail->product_total_price }}</td>
                                                    <td width="30">
                                                        <button class="btn btn-warning" type="submit"
                                                                style="font-size: 14px">
                                                            <i class="fas fa-edit"></i> แก้ไข
                                                        </button>
                                                    {{method_field('PUT')}}
                                                    </td>
                                                </form>
                                                <td width="30">
                                                    <form class="delete_form" method="post"
                                                          action="{{route('order-confirm.delete',[$orderDetail->id])}}">
                                                        @csrf

                                                        <button class="btn btn-danger" type="submit"
                                                                style="font-size: 14px"><i class="far fa-trash-alt"></i>
                                                            ลบรายการนี้
                                                        </button>

                                                        {{method_field('DELETE')}}
                                                    </form>
                                                </td>

                                                <?php $id++ ?>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="row">สินค้าทั้งหมด</th>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $order->total_qty}} ชิ้น</td>
                                                <td>{{ $order->total_price }} บาท</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                    </table>

                                </div>

                                <form class="success_form" method="post" action="{{ route('order-confirm.success',[$order->id]) }}" style="padding-top: 20px">
                                    @csrf

                                    <div class="form-group row" style="padding-top: 23px">
                                        <label class="col-md-5 col-form-label text-md-right" for="deposit"
                                               style="font-size: 16.8px;">ค่ามัดจำ</label>

                                        <div class="col-md-2">
                                            <input id="deposit" min="0" max="100" class="form-control" type="number" name="deposit" value="{{ old('deposit') }}" >
                                            <small class="form-text text-muted">
                                                สามารถกรอกค่ามัดจำได้ที่นี้
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-top: 23px">
                                        <label class="col-md-5 col-form-label text-md-right" for="promotion_id"
                                               style="font-size: 16.8px;">ส่วนลด</label>

                                        <div class="col-md-2">
                                            <select id="promotion_id" class="form-control" name="promotion_id">
                                                <option selected value="0" >ส่วนลด 0 %</option>
                                                @foreach( $promotions as $promotion)
                                                    <option value="{{ $promotion->id }}"
                                                            {{ $order->user->role->name == $promotion->promotion_name? 'selected' : '' }} >
                                                        {{ $promotion->promotion_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small id="promotion_discount" class="form-text text-muted">
                                                สามารถเลือกโปรโมชั่นได้ตรงนี้
                                            </small>
                                        </div>
                                    </div>
                                    <div style="padding-top: 23px">
                                        <input type="submit" title="อนุมัติรายการสั่งซื้อ"
                                               class="btn btn-primary btn-block"
                                               value="อนุมัติรายการ">
                                    </div>
                                    {{method_field('PUT')}}
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('order-confirm.index')}}">กลับหน้ารอยืนยันรายการ</a>
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
    <script>
        $("#deposit").on("keypress", function (evt) {
            var keycode = evt.charCode || evt.keyCode;
            if (keycode == 46 || this.value.length == 2) {
                return false;
            }
        });

        $(document).ready(function () {
            $('.delete_form').on('submit', function () {
                if (confirm("Are you sure?")) {
                    return true;
                } else {
                    return false;
                }
            })
        })

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

        $(document).ready(function () {
            $('.deposit_form').on('submit',function () {
                if(confirm("คุณแน่ใจหรือไม่?")){
                    return true;
                }
                else {
                    return false;
                }
            })
        })



    </script>
@endpush
