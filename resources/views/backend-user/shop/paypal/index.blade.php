@extends('backend-user.layouts.main_dashboard')
@section('title', 'paypal')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">ชำระค่ามัดจำ</h1>
                </div>
                @if($order->payment_status == 0 && $order->order_status == 1 )
                <div class="table-responsive" style="margin-top: 30px">
                    <table class="table" style="color: #000;text-align: center;">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อร้าน</th>
                            <th scope="col">จำนวนเงินที่ต้องชำระทั้งหมด</th>
                            <th scope="col">ค่ามัดจำ</th>
                            <th scope="col">จำนวนเงินที่ต้องชำระค่ามัดจำ</th>

                        </tr>
                        </thead>
                            <tbody>
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->user->shop_name }}</td>
                                <td>{{ $order->total_price_discounted }}</td>
                                <td>{{ $order->deposit }} %</td>
                                <td>
                                    <?php
                                    $resultDivide = $order->total_price_discounted / 100;

                                    $payDeposit = $resultDivide * $order->deposit;
                                    ?>
                                    {{ number_format( $payDeposit,2)  }}
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
                @else
                    <div class="table-responsive" style="margin-top: 30px">
                        <table class="table" style="color: #000;text-align: center;">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่อร้าน</th>
                                <th scope="col">จำนวนเงินทั้งหมด</th>
                                <th scope="col">ค่ามัดจำ</th>
                                <th scope="col">จำนวนเงินค่ามัดจำ</th>
                                <th scope="col">สถานะการจ่ายเงิน</th>
                                <th scope="col">จำนวนเงินค้างชำระ</th>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->user->shop_name }}</td>
                                <td>{{ number_format( $order->total_price_discounted,2) }}</td>
                                <td>{{ $order->deposit }} %</td>
                                <td>
                                    <?php
                                    $resultDivide = $order->total_price_discounted / 100;

                                    $payDeposit = $resultDivide * $order->deposit;
                                    ?>
                                    {{ number_format( $payDeposit,2)  }}
                                </td>
                                @if($order->payment_status == 2)
                                    <td width="180"><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >ชำระรายการสั่งซื้อเรียบร้อย</span></td>
                                @endif
                                <td>
                                    <?php
                                    $resultDivide = $order->total_price_discounted / 100;

                                    $payDeposit = $resultDivide * $order->deposit;

                                    $payment = $order->total_price_discounted - $payDeposit
                                    ?>
                                    {{ number_format(  $payment,2)  }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endif


                <form class="success_form" method="post" action="{{route('order-status.deposit',[$order->id])}}" enctype="multipart/form-data" style="padding-top: 40px">
                    @csrf
                    <div class="form-group" >
                        <h5 >วิธีการชำระเงิน</h5>
                        @if($order->payment_status == 1 || $order->order_status == 1 )
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_status" id="inlineRadio1" value="1"  {{ $order->deposit != null?"checked":"" }}>
                            <label class="form-check-label" for="inlineRadio1">ชำระค่ามัดจำ</label>
                        </div>
                        @endif
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" name="payment_status" id="inlineRadio2" value="3" {{ $order->payment_status == 2?"checked":"" }} >
                            <label class="form-check-label" for="inlineRadio2">ชำระเงินทั้งหมด</label>
                        </div>

                    </div>
                    <div class="form-group" style="padding-top: 20px">
                        <h5 >หลักฐานการชำระเงินค่ามัดจำ</h5>
                        <div class="form-group">
                            <div id="divShowImg">
                                <img  class="rounded" id="previewProduct" style="width: 280px;height: 220px" src="https://via.placeholder.com/180x120.png?text=No%20Image">
                            </div>

                            <div style="margin-left: 15rem;margin-top: 20px"><input class="btn btn-sm btn-warning " type="button" value="Clear" onclick="clearProduct()"></div>

                            @if ($errors->has('proof'))
                                <span style="color: rgba(226,20,17,0.77);font-size: 13px">
                                            <strong>{{ $errors->first('proof') }}</strong>
                                        </span>
                            @endif

                        </div>
                        <input type="file" accept="image/jpeg, image/png"  onchange="readProduct(this);" id="fileProduct"
                               name="proof">
                        <p class="help-block py-2" style="font-size: 14px;">
                            ไฟล์ภาพต้องเป็นนามสกุล jpeg,png เท่านั้น <br>
                            ขนาดไฟล์ไม่เกิน 1 MB <br>
                        </p>

                    </div>
                    <div style="margin-top: 40px";>
                        <input type="submit" value="ชำระเงินค่ามัดจำ" class="btn btn-primary  btn-block">
                    </div>
                    {{method_field('PUT')}}
                </form>
                <hr>
                <div class="text-center">
                    <a href="{{route('order-status.index')}}">กลับไปหน้าดูสถานะ</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>

        function readProduct(input) {
            if (input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProduct').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearProduct() {
            $('#previewProduct').attr('src', "https://via.placeholder.com/180x120.png?text=No%20Image");
            $('#fileProduct').val(null);
        }

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
