@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Production Status')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-shopping-cart"></i> สถานะห้องผลิต</h1>

        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white">
                <thead style="font-size: 14px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33)">
                <tr>
                    <th>ID</th>
                    <th>ชื่อร้าน</th>
                    <th>ห้องขนมไทย</th>
                    <th>ห้องขนมโรล</th>
                    <th>ห้องขนมบราวนี่</th>
                    <th>ห้องขนมเค้ก</th>
                    <th>ห้องขนมคุกกี้</th>
                    <th>เวลาที่สั่งซื้อ</th>
                </tr>
                </thead>
                @if(count($productions) != 0)
                    @foreach( $productions as $production)
                        <tbody style="font-size: 14px ; color: #110100">
                        <tr>
                            <td>{{$production->id}}</td>
                            <td>{{$production->order->user->shop_name}}</td>
                            @if($production->thai_dessert == 0 )
                                <td><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่รับรายการผลิต</span></td>
                            @elseif($production->thai_dessert == 1 )
                                <td><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                            @elseif($production->thai_dessert == 2 )
                                <td><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >การผลิตเสร็จสิ้น</span></td>
                            @elseif($production->thai_dessert == 4 )
                                <td><span class="badge badge-pill  badge-danger" style="color: white;font-size: 13px" >ไม่มีรายการผลิต</span></td>
                            @endif
                            @if($production->role_dessert == 0 )
                                <td><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่รับรายการผลิต</span></td>
                            @elseif($production->role_dessert == 1 )
                                <td><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                            @elseif($production->role_dessert == 2 )
                                <td><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >การผลิตเสร็จสิ้น</span></td>
                            @elseif($production->role_dessert == 4 )
                                <td><span class="badge badge-pill  badge-danger" style="color: white;font-size: 13px" >ไม่มีรายการผลิต</span></td>
                            @endif
                            @if($production->brownie_dessert == 0 )
                                <td><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่รับรายการผลิต</span></td>
                            @elseif($production->brownie_dessert == 1 )
                                <td><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                            @elseif($production->brownie_dessert == 2 )
                                <td><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >การผลิตเสร็จสิ้น</span></td>
                            @elseif($production->brownie_dessert == 4 )
                                <td><span class="badge badge-pill  badge-danger" style="color: white;font-size: 13px" >ไม่มีรายการผลิต</span></td>
                            @endif
                            @if($production->cake_dessert == 0 )
                                <td><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่รับรายการผลิต</span></td>
                            @elseif($production->cake_dessert == 1 )
                                <td><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                            @elseif($production->cake_dessert == 2 )
                                <td><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >การผลิตเสร็จสิ้น</span></td>
                            @elseif($production->cake_dessert == 4 )
                                <td><span class="badge badge-pill  badge-danger" style="color: white;font-size: 13px" >ไม่มีรายการผลิต</span></td>
                            @endif
                            @if($production->cookie_dessert == 0 )
                                <td><span class="badge badge-pill  badge-warning" style="color: white;font-size: 13px" >ยังไม่รับรายการผลิต</span></td>
                            @elseif($production->cookie_dessert == 1 )
                                <td><span class="badge badge-pill  badge-info" style="color: white;font-size: 13px" >กำลังดำเนินการผลิต</span></td>
                            @elseif($production->cookie_dessert == 2 )
                                <td><span class="badge badge-pill  badge-success" style="color: white;font-size: 13px" >การผลิตเสร็จสิ้น</span></td>
                            @elseif($production->cookie_dessert == 4 )
                                <td><span class="badge badge-pill  badge-danger" style="color: white;font-size: 13px" >ไม่มีรายการผลิต</span></td>
                            @endif
                            <td>{{ date('d/m/Y  เวลา H:i น.',strtotime($production->created_at)) }}</td>
                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody style="font-size: 17px ; color: #110100">
                    <tr>
                        <td class="text-center"  colspan="8"> วันนี้ยังไม่มีรายการสั่งซื้อ </td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>

    </div>
@endsection


