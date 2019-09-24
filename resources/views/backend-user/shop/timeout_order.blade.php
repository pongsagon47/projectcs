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
                            หมดเวลาการสั่งซื้อ เนื่องจากทางบริษัทเปิดให้บริการสั่งรายการขนมไม่เกิน 12:00 น. ค่ะ
                        </div>

                        <div class="text-center" style="padding-top: 22px">
                            <a href="{{route('home')}}"> กลับมาหน้าหลัก</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection