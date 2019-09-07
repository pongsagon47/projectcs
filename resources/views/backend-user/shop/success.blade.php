@extends('backend-user.layouts.main_dashboard')
@section('title', 'Order Confirm')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center"> </h5>

                        <div class="alert alert-success text-center" role="alert">
                            สั่งรายการขนมเรียบร้อย
                        </div>

                        <div class="text-center" style="padding-top: 22px">
                            <a href="{{route('home')}}"> กลับมาหน้าหลัก</a>
                            <a style="padding-left: 40px" href="{{route('order-status.index')}}"> ดูสถานะรายการสั่งซื้อ</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


