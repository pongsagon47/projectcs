@extends('backend-user.layouts.main_dashboard')
@section('title', 'Homepage')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    @if(auth()->user()->status == 0)
{{--            <h4 class="text-status-off">ผู้ใช้นี้ยังอยู่ในสถานะยังไม่เปิดการใช้งาน</h4>--}}
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <img class="center" width="300" height="300"  src="{{asset('img/logokidthuang.png')}}" alt="">
                                <div class="alert alert-info text-center" role="alert">
                                    ยังไม่สามารถใช้งานได้ เนื่องจากต้องรออนุมัติจากทางจากทางร้านคิดถึงเบเกอรี่
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    @endif

    @if(auth()->user()->status == 1)

            <div class="container " >
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <img class="center" width="400" height="400"  src="{{asset('img/logokidthuang.png')}}" alt="">
                                <div class="alert alert-success text-center" role="alert">
                                   ยินดีต้อนรับสู่ บริษัท คิดถึงเบเกอรี่
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--        <!-- Content Row -->--}}
{{--        <div class="row">--}}
{{--            <!-- Earnings (Monthly) Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4" style="padding-top: 30px">--}}
{{--                <div class="card border-left-success shadow h-100 py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800 counter">40,000</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-calendar fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    @endif
    </div>


@endsection
@push('script')
<script>

    jQuery(document).ready(function() {

        // counter-up
        $('.counter').counterUp({
            delay: 10,
            time: 500
        });
    } );

</script>
@endpush

