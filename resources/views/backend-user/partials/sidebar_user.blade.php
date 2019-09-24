<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">User <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::currentRouteName() === 'home'  ? 'active' : null }}">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>หน้าหลัก</span></a>
    </li>

@if(auth()->user()->status == 1)

    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            สั่งซื้อ
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'shop.index'||Route::currentRouteName() === 'shop.order'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('shop.index')}}" >
                <i class="fas fa-shopping-cart"></i>
                <span>สั่งรายการขนม</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            สถานะและใบเสร็จ
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'order-status.index'||Route::currentRouteName() === 'order-status.show'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('order-status.index')}}" >
                <i class="fas fa-eye"></i>
                <?php
                $now = Carbon\Carbon::now()->format('Y-m-d');
                $orders = \App\Models\Order::query()
                    ->where('user_id',Auth::user()->id)
                    ->where('order_status','>=','0')
                    ->where('order_status','<=','3')
                    ->where('created_at', '>=', $now.' 00:00:00')
                    ->where('created_at', '<=', $now.' 23:59:59')
                    ->get();
                $noti_order = count($orders);
                ?>
                <span>
                    ดูสถานะและใบเสร็จ
                    @if( $noti_order != null)
                        <span class="badge badge-danger">{{ $noti_order }}</span>
                    @endif
                </span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            รายงานรายการสั่งซื้อของฉัน
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'report-order.index'||Route::currentRouteName() === 'report-order.bill'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('report-order.index')}}" >
                <i class="fas fa-book"></i>
                <span>
                    รายงานการสั่งซื้อทั้งหมด
                </span>
            </a>
        </li>

@endif

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
