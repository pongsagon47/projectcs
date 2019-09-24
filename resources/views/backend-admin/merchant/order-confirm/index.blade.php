@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Order Check Today')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-shopping-cart"></i> รายการสั่งซื้อวันนี้ที่รอยืนยัน </h1>

        </div>

        @if(\Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{\Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(\Session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{\Session::get('deleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white">
                <thead style="font-size: 14px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33)">
                <tr>
                    <th>ID</th>
                    <th>ชื่อร้าน</th>
                    <th>ประเภทลูกค้า</th>
                    <th>จำนวนขนมที่สั่ง</th>
                    <th>ราคารวม</th>
                    <th>เวลาที่สั่งซื้อ</th>
                    <th>ยืนยันรายการสั่งซื้อ</th>
                </tr>
                </thead>
                @if(count($orders) != 0)
                @foreach( $orders as $order)
                    <tbody style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->shop_name }}</td>
                        <td>{{ $order->user->role->name }}</td>
                        <td>{{ $order->total_qty }} ชิ้น</td>
                        <td>{{ $order->total_price }} บาท</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <form class="delete_form" method="post" action="{{route('order-confirm.destroy',[$order->id])}}">
                                @csrf

                                <a href="{{route('order-confirm.confirm',[$order->id])}}" class="btn btn-success " title="Confirm Record" >
                                    <i class="fas fa-edit"> ตรวจสอบ และ ยืนบัน</i>
                                </a>
                                <button type="submit" class="btn btn-danger" title="Delete Order"><i class="fas fa-trash-alt"></i> ลบรายการสั่งซื้อ</button>
                                {{method_field('DELETE')}}
                            </form>

                        </td>

                    </tr>
                    </tbody>
                @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center"  colspan="7"> ไม่มีรายการสั่งซื้อที่ยังไม่อนุมัติ </td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>

    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete_form').on('submit',function () {
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


