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

