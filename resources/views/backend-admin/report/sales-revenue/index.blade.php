@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Sales revenue')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">รายงานรายได้จากการขายในแต่ละวัน</h1>
        </div>

        <form class="form-inline" method="post" action="{{route('report-revenue.search')}}" role="search">
            @csrf
            <div class="form-group mb-2">
                <label style="padding-right: 5px" >จากวันที่</label>
{{--                <input type="date" value="" class="form-control"  name="from">--}}
                <input class="form-control" type="text" name="dateStart" id="dateStart" value="{{$dateStart}}" />
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label style="padding-right: 5px"> ถึง </label>
{{--                <input type="date" value=""  class="form-control" >--}}
                <input class="form-control" type="text" name="dateEnd" id="dateEnd" value="{{$dateEnd}}" />
            </div>
            <button class="btn btn-info mb-2"  type="submit"><i class="fa fa-search"></i></button>
        </form>


        <div class="table-responsive" style="margin-top: 25px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="font-size: 15px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33);">
                <tr>
                    <th>ID</th>
                    <th>ชื่อร้าน</th>
                    <th>ประเภทลูกค้า</th>
                    <th>จำนวนรวม</th>
                    <th>ราคารวม</th>
                    <th>ส่วนลด</th>
                    <th width="180">ราคารวมหักส่วนลด</th>
                    <th>เวลาที่สั่งซื้อ</th>
                    <th>รายละเอียด</th>
                </tr>
                </thead>
                @if(count($orders) != 0)
                    @foreach( $orders as $order)
                        <tbody style="font-size: 14px ; color: #110100">
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->shop_name }}</td>
                            <td>{{ $order->user->role->name }}</td>
                            <td width="120">{{ $order->total_qty }} ชิ้น</td>
                            <td>{{ $order->total_price }} บาท</td>
                            <td>{{ $order->promotion->promotion_discount }} %</td>
                            <td>{{ $order->total_price_discounted }} บาท</td>
                            <td>{{ date('d/m/Y  เวลา H:i น.',strtotime($order->created_at)) }}</td>
                            <td>
                                <a href="{{route('report-revenue.detail',[$order->id])}}" class="btn btn-success "
                                   title="Confirm Record">
                                    <i class="far fa-eye"> รายละเอียด </i>
                                </a>
                            </td>

                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center" colspan="7"> วันนี้ยังไม่มีรายการสั่งซื้อ</td>
                    </tr>
                    </tbody>
                @endif

            </table>
            <div class="flex-center">
                {{ $orders->render() }}
            </div>
        </div>
    </div>


@endsection
@push('script')
    <script type="text/javascript">

        $(function(){

            var startDateTextBox = $('#dateStart');
            var endDateTextBox = $('#dateEnd');

            startDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function(dateText, inst) {
                    if (endDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            endDateTextBox.datetimepicker('setDate', testStartDate);
                    }
                    else {
                        endDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
                }
            });
            endDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function(dateText, inst) {
                    if (startDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            startDateTextBox.datetimepicker('setDate', testEndDate);
                    }
                    else {
                        startDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
                }
            });

        });

    </script>
@endpush
