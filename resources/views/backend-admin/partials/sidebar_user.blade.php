<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('employee.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ Auth::user()->role_employee->name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::currentRouteName() === 'employee.home'  ? 'active' : null }}">
        <a class="nav-link" href="{{route('employee.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>หน้าหลัก</span></a>
    </li>
@if(auth()->user()->role_employee_id == 1)
    <!-- Divider -->
        <hr class="sidebar-divider">
        {{--        <!-- Heading -->--}}
        {{--        <div class="sidebar-heading">--}}
        {{--            คำร้องขอสมัครสมาชิก--}}
        {{--        </div>--}}
        <div class="sidebar-heading">
            การจัดการข้อมูล
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'user-register.index'||Route::currentRouteName() === 'user-register.search'
        ||Route::currentRouteName() === 'user-register.detail'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('user-register.index')}}">
                <?php
                $users = \App\Models\User::query()->where('status', 0)->get();
                $noti_user = count($users);
                ?>
                <i class="fas fa-users"></i>

                <span> ข้อมูลการสมัครสมาชิก
                    @if( $noti_user != null)
                        <span class="badge badge-danger">{{ $noti_user }}</span>
                    @endif
                </span>
            </a>
        </li>


        <!-- Divider -->
    {{--        <hr class="sidebar-divider">--}}
    {{--        <!-- Heading -->--}}
    {{--        <div class="sidebar-heading">--}}
    {{--            การจัดการข้อมูล--}}
    {{--        </div>--}}


    <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'user.index'|| Route::currentRouteName() === 'employee.index'|| Route::currentRouteName() === 'employee.detail'
    || Route::currentRouteName() === 'user.detail'|| Route::currentRouteName() === 'employee.edit'|| Route::currentRouteName() === 'user.edit'
    || Route::currentRouteName() === 'user.create'|| Route::currentRouteName() === 'employee.create'|| Route::currentRouteName() === 'employee.search'
    || Route::currentRouteName() === 'user.search'||Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product.show'||Route::currentRouteName() === 'product.edit'
        ||Route::currentRouteName() === 'product.create'||Route::currentRouteName() === 'product.search'|| Route::currentRouteName() === 'promotion.index'||Route::currentRouteName() === 'promotion.edit'
        ||Route::currentRouteName() === 'promotion.create' ? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>การจัดการข้อมูล</span>
            </a>
            <div id="collapseUtilities" class="collapse {{ Route::currentRouteName() === 'user.index'|| Route::currentRouteName() === 'employee.index'
        || Route::currentRouteName() === 'employee.detail'|| Route::currentRouteName() === 'user.detail'|| Route::currentRouteName() === 'employee.edit'|| Route::currentRouteName() === 'user.edit'
        || Route::currentRouteName() === 'user.create'|| Route::currentRouteName() === 'employee.create'|| Route::currentRouteName() === 'employee.search'
        || Route::currentRouteName() === 'user.search'|| Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product.show'||Route::currentRouteName() === 'product.edit'
        ||Route::currentRouteName() === 'product.create'||Route::currentRouteName() === 'product.search'|| Route::currentRouteName() === 'promotion.index'||Route::currentRouteName() === 'promotion.edit'
        ||Route::currentRouteName() === 'promotion.create' ? 'show' : null }}" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ข้อมูลผู้ใช้</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'user.index'|| Route::currentRouteName() === 'user.detail'|| Route::currentRouteName() === 'user.edit'
                || Route::currentRouteName() === 'user.create' || Route::currentRouteName() === 'user.search' ? 'active' : null }}"
                       href="{{route('user.index')}}">ข้อมูลลูกค้า</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'employee.index'|| Route::currentRouteName() === 'employee.detail'|| Route::currentRouteName() === 'employee.edit'
                || Route::currentRouteName() === 'employee.create'|| Route::currentRouteName() === 'employee.search'  ? 'active' : null }}"
                       href="{{route('employee.index')}}">ข้อมูลพนักงาน</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product.show'||Route::currentRouteName() === 'product.edit'
        ||Route::currentRouteName() === 'product.create'||Route::currentRouteName() === 'product.search'? 'active' : null }}"
                       href="{{route('product.index')}}">จัดการสินค้า</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'promotion.index'||Route::currentRouteName() === 'promotion.edit'||Route::currentRouteName() === 'promotion.create'? 'active' : null }}"
                       href="{{route('promotion.index')}}">จัดการโปรโมชั่น</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
    {{--        <hr class="sidebar-divider">--}}

    <!-- Heading -->
    {{--        <div class="sidebar-heading">--}}
    {{--            จัดการหน้าเว็บ--}}
    {{--        </div>--}}

    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'about-us.create'|| Route::currentRouteName() === 'intro.create'
        ||Route::currentRouteName() === 'news.index'||Route::currentRouteName() === 'news-category.index'||Route::currentRouteName() === 'news-category.create'
        ||Route::currentRouteName() === 'news.index'||Route::currentRouteName() === 'news.create'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-chalkboard"></i>
                <span>จัดการหน้าเว็บ</span>
            </a>
            <div id="collapsePages" class="collapse {{ Route::currentRouteName() === 'about-us.create'|| Route::currentRouteName() === 'intro.create'
            ||Route::currentRouteName() === 'news.index'|| Route::currentRouteName() === 'news-category.index'||Route::currentRouteName() === 'news-category.create'
            ||Route::currentRouteName() === 'news.index'||Route::currentRouteName() === 'news.create'? 'show' : null }}"
                 aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">จัดการหน้าเว็บ:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'intro.create' ?'active': null }}"
                       href="{{route('intro.create')}}">หน้าหลัก</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'about-us.create' ? 'active' : null }}"
                       href="{{route('about-us.create')}}">เกี่ยวกับ</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">ข่าวสาร:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'news-category.index'||Route::currentRouteName() === 'news-category.create' ?'active': null }}"
                       href="{{route('news-category.index')}}">หมวดหมู่</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'news.index'||Route::currentRouteName() === 'news.create' ?'active': null }}"
                       href="{{route('news.index')}}">ข่าวสาร</a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 2)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            รายการสั่งซื้อวันนี้
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'order-confirm.index'||Route::currentRouteName() === 'order-confirm.confirm'||Route::currentRouteName() === 'order-confirm.proof'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('order-confirm.index')}}">
                <i class="fas fa-shopping-cart"></i>
                <?php
                $now = Carbon\Carbon::now()->format('Y-m-d');
                $orders = \App\Models\Order::query()
                    ->where('order_status', '>=', '0')
                    ->where('order_status', '<=', '1')
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();
                $noti_order = count($orders);
                ?>
                <span> รายการที่รอยืนยัน
                    @if( $noti_order != null)
                        <span class="badge badge-danger">{{ $noti_order }}</span>
                    @endif
                </span>
            </a>
        </li>

        <!-- Divider -->
    {{--        <hr class="sidebar-divider">--}}

    <!-- Heading -->
    {{--        <div class="sidebar-heading">--}}
    {{--            ดูรายการสั่งซื้อวันนี้--}}
    {{--        </div>--}}

    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'order-today.index'||Route::currentRouteName() === 'order-today.show'||Route::currentRouteName() === 'order-today.production'||Route::currentRouteName() === 'order-today.proof'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrderToday"
               aria-expanded="true" aria-controls="collapseOrderToday">
                <i class="fas fa-shopping-cart"></i>
                <?php
                $now = Carbon\Carbon::now()->format('Y-m-d');
                $orders_today = \App\Models\Order::query()
                    ->where('order_status', '>=', '2')
                    ->where('order_status', '<=', '4')
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();
                $today_order = count($orders_today);
                ?>
                <span>
                    รายการสั่งซื้อ
                     @if( $today_order != null)
                        <span class="badge badge-danger">{{ $today_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseOrderToday"
                 class="collapse {{ Route::currentRouteName() === 'order-today.index'||Route::currentRouteName() === 'order-today.show'||Route::currentRouteName() === 'order-today.production'||
                 Route::currentRouteName() === 'order-today.proof'? 'show' : null }}" aria-labelledby="headingOrderToday" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'order-today.index'||Route::currentRouteName() === 'order-today.show'||Route::currentRouteName() === 'order-today.proof'? 'active' : null }}"
                       href="{{ route('order-today.index') }}">
                        รายการสั่งซื้อ
                        @if( $today_order != null)
                            <span class="badge badge-danger">{{ $today_order }}</span>
                        @endif
                    </a>
                    <h6 class="collapse-header">สถานะห้องผลิต :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'order-today.production'? 'active' : null }}"
                       href="{{ route('order-today.production') }}">ดูสถานะห้องผลิต</a>
                </div>
            </div>
        </li>
@endif

@if(auth()->user()->role_employee_id == 3)

    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            รายการส่งสินค้าวันนี้
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{Route::currentRouteName() === 'delivery.index'||Route::currentRouteName() === 'delivery.bill'||Route::currentRouteName() === 'delivery.user' ? 'active' : null }}">
            <a class="nav-link" href="{{ route('delivery.index') }}">
                <i class="fas fa-truck"></i>
                <?php
                $orders_delivery = \App\Models\Order::query()
                    ->where('order_status', 4)
                    ->get();
                $today_delivery = count($orders_delivery);
                ?>
                <span> รายการที่ต้องส่งสินค้า
                     @if( $today_delivery != null)
                        <span class="badge badge-danger">{{ $today_delivery  }}</span>
                    @endif
                </span>
            </a>
        </li>

@endif
@if(auth()->user()->role_employee_id == 4)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมไทย
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'thai-dessert.index'||Route::currentRouteName() === 'thai-dessert.show'
                 ||Route::currentRouteName() === 'thai-dessert.maker'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThaiDassert"
               aria-expanded="true" aria-controls="collapseThaiDassert">
                <i class="fas fa-stroopwafel"></i>
                <?php

                $now = Carbon\Carbon::now()->format('Y-m-d');
                $productions = \App\Models\ProductionStatus::query()
                    ->where('thai_dessert', '>=', 0)
                    ->where('thai_dessert', '<=', 1)
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();

                $thai_order = count($productions);
                ?>
                <span>
                    รายการสั่งขนมไทย
                    @if( $thai_order != null)
                        <span class="badge badge-danger">{{ $thai_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseThaiDassert"
                 class="collapse {{ Route::currentRouteName() === 'thai-dessert.index'||Route::currentRouteName() === 'thai-dessert.show'
                 ||Route::currentRouteName() === 'thai-dessert.maker'? 'show' : null }}"
                 aria-labelledby="headingThaiDassert" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'thai-dessert.index'||Route::currentRouteName() === 'thai-dessert.show'? 'active' : null }}"
                       href="{{ route('thai-dessert.index') }}">รายการสั่งซื้อ
                        @if( $thai_order != null)
                            <span class="badge badge-danger">{{ $thai_order }}</span>
                        @endif
                    </a>
                    <h6 class="collapse-header">ขนมที่ต้องผลิต:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'thai-dessert.maker'? 'active' : null }}"
                       href="{{ route('thai-dessert.maker') }}">รายการขนมที่ต้องผลิต</a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 5)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมโรล
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'role-dessert.index'||Route::currentRouteName() === 'role-dessert.maker'
                 ||Route::currentRouteName() === 'role-dessert.show'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleDessert"
               aria-expanded="true" aria-controls="collapseRoleDessert">
                <i class="fas fa-stroopwafel"></i>
                <?php

                $now = Carbon\Carbon::now()->format('Y-m-d');
                $productions = \App\Models\ProductionStatus::query()
                    ->where('role_dessert', '>=', 0)
                    ->where('role_dessert', '<=', 1)
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();

                $role_order = count($productions);
                ?>
                <span>
                    รายการสั่งซื้อขนมโรล
                     @if( $role_order != null)
                        <span class="badge badge-danger">{{ $role_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseRoleDessert"
                 class="collapse {{ Route::currentRouteName() === 'role-dessert.index'||Route::currentRouteName() === 'role-dessert.maker'
                 ||Route::currentRouteName() === 'role-dessert.show'? 'show' : null }}"
                 aria-labelledby="headingRoleDessert" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'role-dessert.index'||Route::currentRouteName() === 'role-dessert.show'? 'active' : null }}"
                       href="{{ route('role-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $role_order != null)
                            <span class="badge badge-danger">{{ $role_order }}</span>
                        @endif
                    </a>
                    <h6 class="collapse-header">ขนมที่ต้องผลิต:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'role-dessert.maker'? 'active' : null }}"
                       href="{{ route('role-dessert.maker') }}">รายการขนมที่ต้องผลิต</a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 6)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมบราวนี่
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'brownie-dessert.index'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrownies"
               aria-expanded="true" aria-controls="collapseBrownies">
                <i class="fas fa-stroopwafel"></i>
                <?php

                $now = Carbon\Carbon::now()->format('Y-m-d');
                $productions = \App\Models\ProductionStatus::query()
                    ->where('brownie_dessert', '>=', 0)
                    ->where('brownie_dessert', '<=', 1)
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();

                $brownie_order = count($productions);
                ?>
                <span>
                    รายการสั่งซื้อขนมบราวนี่
                    @if( $brownie_order != null)
                        <span class="badge badge-danger">{{ $brownie_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseBrownies"
                 class="collapse {{ Route::currentRouteName() === 'brownie-dessert.index'||Route::currentRouteName() === 'brownie-dessert.maker'
                 ||Route::currentRouteName() === 'brownie-dessert.show'? 'show' : null }}"
                 aria-labelledby="headingBrownies" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'brownie-dessert.index'||Route::currentRouteName() === 'brownie-dessert.show'? 'active' : null }}"
                       href="{{ route('brownie-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $brownie_order != null)
                            <span class="badge badge-danger">{{ $brownie_order }}</span>
                        @endif
                    </a>
                    <h6 class="collapse-header">ขนมที่ต้องผลิต:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'brownie-dessert.maker'? 'active' : null }}"
                       href="{{ route('brownie-dessert.maker') }}">รายการขนมที่ต้องผลิต</a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 7)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมเค้ก
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'cake-dessert.index'||Route::currentRouteName() === 'cake-dessert.maker'
                 ||Route::currentRouteName() === 'cake-dessert.show'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCake"
               aria-expanded="true" aria-controls="collapseCake">
                <i class="fas fa-stroopwafel"></i>
                <?php
                $now = Carbon\Carbon::now()->format('Y-m-d');
                $productions = \App\Models\ProductionStatus::query()
                    ->where('cake_dessert', '>=', 0)
                    ->where('cake_dessert', '<=', 1)
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();

                $cake_order = count($productions);
                ?>
                <span>
                    รายการสั่งซื้อขนมเค้ก
                    @if( $cake_order != null)
                        <span class="badge badge-danger">{{ $cake_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseCake"
                 class="collapse {{ Route::currentRouteName() === 'cake-dessert.index'||Route::currentRouteName() === 'cake-dessert.maker'
                 ||Route::currentRouteName() === 'cake-dessert.show'? 'show' : null }}"
                 aria-labelledby="headingCake" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'cake-dessert.index'||Route::currentRouteName() === 'cake-dessert.show'? 'active' : null }}"
                       href="{{ route('cake-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $cake_order != null)
                            <span class="badge badge-danger">{{ $cake_order }}</span>
                        @endif
                    </a>
                    <h6 class="collapse-header">ขนมที่ต้องผลิต:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'cake-dessert.maker'? 'active' : null }}"
                       href="{{ route('cake-dessert.maker') }}">รายการขนมที่ต้องผลิต</a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 8)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมคุกกี้
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'cookie-dessert.index'||Route::currentRouteName() === 'cookie-dessert.maker'
                 ||Route::currentRouteName() === 'cookie-dessert.show'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCookie"
               aria-expanded="true" aria-controls="collapseCookie">
                <i class="fas fa-stroopwafel"></i>
                <?php

                $now = Carbon\Carbon::now()->format('Y-m-d');
                $productions = \App\Models\ProductionStatus::query()
                    ->where('cookie_dessert', '>=', 0)
                    ->where('cookie_dessert', '<=', 1)
                    ->where('created_at', '>=', $now . ' 00:00:00')
                    ->where('created_at', '<=', $now . ' 23:59:59')
                    ->get();

                $cookie_order = count($productions);
                ?>
                <span>
                    รายการสั่งซื้อขนมคุกกี้
                    @if( $cookie_order != null)
                        <span class="badge badge-danger">{{ $cookie_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseCookie"
                 class="collapse {{ Route::currentRouteName() === 'cookie-dessert.index'||Route::currentRouteName() === 'cookie-dessert.maker'
                 ||Route::currentRouteName() === 'cookie-dessert.show'? 'show' : null }}"
                 aria-labelledby="headingCookie" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'cookie-dessert.index'||Route::currentRouteName() === 'cookie-dessert.show'? 'active' : null }}"
                       href="{{ route('cookie-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $cookie_order != null)
                            <span class="badge badge-danger">{{ $cookie_order }}</span>
                        @endif
                    </a>
                    <h6 class="collapse-header">ขนมที่ต้องผลิต:</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'cookie-dessert.maker'? 'active' : null }}"
                       href="{{ route('cookie-dessert.maker') }}">รายการขนมที่ต้องผลิต</a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 1)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ออกรายงาน
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'report-revenue.index'||Route::currentRouteName() === 'report-revenue.search'||Route::currentRouteName() === 'production-list.index'
    ||Route::currentRouteName() === 'branch-store.index'||Route::currentRouteName() === 'dessert-sales.index'||Route::currentRouteName() === 'production-list.search'
    ||Route::currentRouteName() === 'production-list.detail'||Route::currentRouteName() === 'report-revenue.detail'||Route::currentRouteName() === 'dessert-sales.search'
    ||Route::currentRouteName() === 'branch-store.search'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
               aria-expanded="true" aria-controls="collapseReport">
                <i class="fas fa-fw fa-cog"></i>
                <span>รายงานรายการขนม</span>
            </a>
            <div id="collapseReport" class="collapse {{ Route::currentRouteName() === 'report-revenue.index'||Route::currentRouteName() === 'report-revenue.search'||Route::currentRouteName() === 'production-list.index'
        ||Route::currentRouteName() === 'branch-store.index'||Route::currentRouteName() === 'dessert-sales.index'||Route::currentRouteName() === 'production-list.search'
        ||Route::currentRouteName() === 'production-list.detail'||Route::currentRouteName() === 'report-revenue.detail'||Route::currentRouteName() === 'dessert-sales.search'
        ||Route::currentRouteName() === 'branch-store.search'? 'show' : null }}"
                 aria-labelledby="headingReport" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายงาน :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'production-list.index'||Route::currentRouteName() === 'production-list.search'
                ||Route::currentRouteName() === 'production-list.detail'? 'active' : null }}"
                       href="{{ route('production-list.index') }}">รายงานการผลิตขนมใน<br>แต่ละวัน</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'report-revenue.index'||Route::currentRouteName() === 'report-revenue.search'
                ||Route::currentRouteName() === 'report-revenue.detail'? 'active' : null }}"
                       href="{{ route('report-revenue.index') }}">รายงานรายได้จากการขาย<br>ในแต่ละวัน</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'dessert-sales.index'||Route::currentRouteName() === 'dessert-sales.search'? 'active' : null }}"
                       href="{{ route('dessert-sales.index') }}">รายงานขนมที่มียอดขาย<br>มากที่สุดและน้อยที่สุด</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'branch-store.index'||Route::currentRouteName() === 'branch-store.search'? 'active' : null }}"
                       href="{{ route('branch-store.index') }}">รายงานสาขาที่มียอดสั่ง<br>ขนมมากที่สุดน้อยที่สุด</a>
                </div>
            </div>
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
