@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Proof of payment')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-shopping-cart"></i>หลักฐานการชำระค่ามัดจำ</h1>

        </div>
        <div class="table-responsive" style="margin-top: 30px">
            <table class="table" style="color: #000;text-align: center;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อร้าน</th>
                    <th scope="col">ประเภทร้านค้า</th>
                    <th scope="col">จำนวนเงินที่ต้องชำระทั้งหมด</th>
                    <th scope="col">ค่ามัดจำ</th>
                    <th scope="col">จำนวนเงินที่ต้องชำระค่ามัดจำ</th>
                    <th scope="col">เวลาสั่งซื้อ</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->user->shop_name }}</td>
                    <td>{{ $order->user->role->name }}</td>
                    <td>{{ $order->total_price_discounted }}</td>
                    <td>{{ $order->deposit }} %</td>
                    <td>
                        <?php
                        $resultDivide = $order->total_price_discounted / 100;

                        $payDeposit = $resultDivide * $order->deposit;
                        ?>
                        {{ number_format( $payDeposit,2)  }}
                    </td>
                    <td>{{ date('เวลา H:i น.',strtotime($order->created_at)) }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group" style="padding-top: 20px">
            <h5>หลักฐานการชำระเงิน</h5>
            <div class="form-group">
                @if($order->proof_of_deposit != null)
                    <img class="rounded" id="myImg" src="{{asset('storage/'.$order->proof_of_deposit)}}" alt="หลักฐานการชำระเงิน" style="width: 350px;height: 360px">
                @elseif($order->proof_of_payment != null)
                    <img class="rounded" id="myImg" src="{{asset('storage/'.$order->proof_of_payment)}}" alt="หลักฐานการชำระเงิน" style="width: 350px;height: 360px">
                @else
                    <h4 style="color: red">ยังไม่มีการชำระเงิน</h4>
{{--                    <img class="rounded " style="width: 350px;height: 360px" src="https://via.placeholder.com/180x120.png?text=No%20Image" alt="">--}}
                @endif
            </div>
            <p class="help-block py-2" style="font-size: 17px;"> <strong> สถานะการชำระเงิน &nbsp;</strong>
                @if($order->payment_status == 1)
                    หลักฐานการชำระเงินค่ามัดจำ
                @elseif($order->payment_status == 2)
                    หลักฐานการชำระเงินรายการสั่งซื้อทั้งหมด
                @endif
            </p>

        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img style="width: 100%;height: 700px" class="modal-content" id="img01">
            <div id="caption"></div>
        </div>

        @if($order->payment_status != 0)
        <div class="form-group" style="margin-top: 30px">
            <div class="row">
                <form class="delete_form col-md-6 " method="post" action="{{route('order-confirm.destroyProof',[$order->id])}}">
                    @csrf
                    <input type="hidden" name="payment_status" value="{{$order->payment_status}}">
                    <div class="pull-right" style="padding-top: 14px">
                        <button class="btn btn-danger" type="submit"> <i class="far fa-times-circle"></i> ยืนยันการชำระเงิน</button>
                    </div>
                    {{method_field('PUT')}}

                </form>
                <form class="success_form col-md-6 " method="post" action="{{route('order-confirm.proofSuccess',[$order->id])}}">
                    @csrf
                    <input type="hidden" name="order_status" value="2">
                    <input type="hidden" name="payment_status" value="{{$order->payment_status}}">
                    <div class="pull-left" style="padding-top: 14px">
                        <button class="btn btn-primary" type="submit">ยืนยันการชำระเงิน <i class="far fa-check-circle"></i></button>
                    </div>
                    {{method_field('PUT')}}
                </form>
            </div>
        </div>
        @endif
        <hr>
        <div class="text-center">
            <a href="{{route('order-confirm.index')}}">กลับไปหน้ายืนยันรายการ</a>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.success_form').on('submit', function () {
                if (confirm("Are you sure?")) {
                    return true;
                } else {
                    return false;
                }
            })
        })

        $(document).ready(function () {
            $('.delete_form').on('submit', function () {
                if (confirm("Are you sure?")) {
                    return true;
                } else {
                    return false;
                }
            })
        })

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endpush


