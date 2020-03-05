@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Sales revenue')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">รายงานขนมที่มียอดขายมากที่สุดและน้อยที่สุด</h1>
        </div>
        <form class="form-inline" method="post" action="{{route('dessert-sales.search')}}" role="search">
            @csrf
            <div class="form-group mb-2">
                <label style="padding-right: 5px" >จากวันที่</label>
                @if($dateStart == null)
                    <input class="form-control" type="text" name="dateStart" id="dateStart" value="{{ $dateStart }}" />
                @else
                    <input class="form-control" type="text" name="dateStart" id="dateStart" value="{{ date('d-M-Y',strtotime($dateStart))}}" />
                @endif
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label style="padding-right: 5px"> ถึง </label>
                @if($dateStart == null)
                    <input class="form-control" type="text" name="dateEnd" id="dateEnd" value="{{ $dateEnd}}" />
                @else
                    <input class="form-control" type="text" name="dateEnd" id="dateEnd" value="{{ date('d-M-Y',strtotime($dateEnd))}}" />
                @endif
            </div>
            <button class="btn btn-info mb-2"  type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="table-responsive" style="margin-top: 25px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="font-size: 15px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33);">
                <tr>
                    <th>#</th>
                    <th>ชื่อขนม</th>
{{--                    <th>ประเภทห้องขนม</th>--}}
                    <th>จำนวนการผลิตขนมรวม</th>
                    <th>ราคารวม</th>
                </tr>
                </thead>
                @if(count($orderDetails) != 0)
                <?php $id = 1  ?>
                @foreach( $orderDetails as $orderDetail)
                <tbody style="font-size: 14px ; color: #110100">
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{$orderDetail->products->name}}</td>
                    <td>{{$orderDetail->total_qty}}</td>
                    <td>{{ number_format($orderDetail->total_price,2) }} บาท</td>
                </tr>
                </tbody>
                    <?php $id++; ?>
                @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center" colspan="4"> วันนี้ยังไม่มีรายการสั่งซื้อ</td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>
    </div>


    <!-- /.container-fluid -->
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
