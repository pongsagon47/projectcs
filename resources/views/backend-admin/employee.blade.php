@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Homepage')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <img class="center" width="300" height="300"  src="{{asset('img/logokidthuang.png')}}" alt="">
        </div>
        <!-- Content Row -->
        <div class="row" style="margin-top: 30px">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 16px">จำนวนลูกค้า</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 counter">{{count($userQty)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 16px">จำนวนสินค้า</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 counter">{{count($productQty)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-birthday-cake fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 16px">รายการสั่งซื้อวันนี้</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 counter">{{count($orderQty)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
