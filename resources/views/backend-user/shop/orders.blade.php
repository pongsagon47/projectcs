@extends('backend-user.layouts.main_dashboard')
@section('title', 'time out order')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center"> </h5>

                        <div class="alert alert-danger text-center" role="alert">
                            วันนี้คุณสั่งซื้อรายการขนมไปเรียบร้อยแล้ว เนื่องจากทางคิดถึงเบเกอรี่จำกัดการสั่งซื้อรายการขนมได้วันละ 1 ครั้งเท่านั้น
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