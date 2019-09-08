<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('employee.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::currentRouteName() === 'employee.home'  ? 'active' : null }}">
        <a class="nav-link" href="{{route('employee.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
@if(auth()->user()->role_employee_id == 1)
    <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            คำร้องขอสมัครสมาชิก
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'user-register.index'||Route::currentRouteName() === 'user-register.search'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('user-register.index')}}">
                <?php
                $users = \App\Models\User::query()->where('status',0)->get();
                $noti_user = count($users);
                ?>
                <i class="fas fa-users"></i>

                <span> ข้อมูลการสมัครลูกค้า
                    @if( $noti_user != null)
                        <span class="badge badge-danger">{{ $noti_user }}</span>
                    @endif
                </span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            การจัดการข้อมูล
        </div>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'user.index'|| Route::currentRouteName() === 'employee.index'|| Route::currentRouteName() === 'employee.detail'
    || Route::currentRouteName() === 'user.detail'|| Route::currentRouteName() === 'employee.edit'|| Route::currentRouteName() === 'user.edit'
    || Route::currentRouteName() === 'user.create'|| Route::currentRouteName() === 'employee.create'|| Route::currentRouteName() === 'employee.search'
    || Route::currentRouteName() === 'user.search' ? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>ข้อมูลผู้ใช้</span>
            </a>
            <div id="collapseUtilities" class="collapse {{ Route::currentRouteName() === 'user.index'|| Route::currentRouteName() === 'employee.index'
        || Route::currentRouteName() === 'employee.detail'|| Route::currentRouteName() === 'user.detail'|| Route::currentRouteName() === 'employee.edit'|| Route::currentRouteName() === 'user.edit'
        || Route::currentRouteName() === 'user.create'|| Route::currentRouteName() === 'employee.create'|| Route::currentRouteName() === 'employee.search'
        || Route::currentRouteName() === 'user.search' ? 'show' : null }}" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ข้อมูลผู้ใช้</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'user.index'|| Route::currentRouteName() === 'user.detail'|| Route::currentRouteName() === 'user.edit'
                || Route::currentRouteName() === 'user.create' || Route::currentRouteName() === 'user.search' ? 'active' : null }}"
                       href="{{route('user.index')}}">ข้อมูลลูกค้า</a>
                    <a class="collapse-item {{ Route::currentRouteName() === 'employee.index'|| Route::currentRouteName() === 'employee.detail'|| Route::currentRouteName() === 'employee.edit'
                || Route::currentRouteName() === 'employee.create'|| Route::currentRouteName() === 'employee.search'  ? 'active' : null }}"
                       href="{{route('employee.index')}}">ข้อมูลพนักงาน</a>
                </div>
            </div>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            การจัดการข้อมูลขนม
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product.show'||Route::currentRouteName() === 'product.edit'
        ||Route::currentRouteName() === 'product.create'||Route::currentRouteName() === 'product.search' ? 'active' : null }}">
            <a class="nav-link" href="{{route('product.index')}}">
                <i class="fab fa-product-hunt"></i>

                <span>การจัดการสินค้า</span>
            </a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'promotion.index'||Route::currentRouteName() === 'promotion.edit'||Route::currentRouteName() === 'promotion.create' ? 'active' : null }}">
            <a class="nav-link" href="{{route('promotion.index')}}">
                <i class="fas fa-book-reader"></i>

                <span> โปรโมชั่น</span>
            </a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            จัดการหน้าเว็บ
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'about-us.create'|| Route::currentRouteName() === 'intro.create'
        ||Route::currentRouteName() === 'news.index'||Route::currentRouteName() === 'news-category.index'||Route::currentRouteName() === 'news-category.create'
        ||Route::currentRouteName() === 'news.index'||Route::currentRouteName() === 'news.create'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-chalkboard"></i>
                <span>หน้าเว็บ</span>
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
@if(auth()->user()->role_employee_id == 1||auth()->user()->role_employee_id == 2)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            รายการสั่งซื้อวันนี้ที่ยังไม่อนุมัติ
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Route::currentRouteName() === 'order-confirm.index'||Route::currentRouteName() === 'order-confirm.confirm'  ? 'active' : null }}">
            <a class="nav-link" href="{{route('order-confirm.index')}}">
                <i class="fas fa-shopping-cart"></i>
                <?php
                $orders = \App\Models\Order::query()->where('order_status',0)->get();
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
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ดูรายการสั่งซื้อวันนี้
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'order-today.index'||Route::currentRouteName() === 'order-today.show'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrderToday"
               aria-expanded="true" aria-controls="collapseOrderToday">
                <i class="fas fa-shopping-cart"></i>
                <?php
                $orders_today = \App\Models\Order::query()
                    ->where('order_status','>=','1')
                    ->where('order_status','<=','4')
                    ->get();
                $today_order = count($orders_today);
                ?>
                <span>
                    รายการสั่งซื้อวันนี้
                     @if( $today_order != null)
                        <span class="badge badge-danger">{{ $today_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseOrderToday"
                 class="collapse {{ Route::currentRouteName() === 'order-today.index'||Route::currentRouteName() === 'order-today.show'? 'show' : null }}"
                 aria-labelledby="headingOrderToday" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'order-today.index'||Route::currentRouteName() === 'order-today.show'? 'active' : null }}"
                       href="{{ route('order-today.index') }}">
                        รายการสั่งซื้อ
                        @if( $today_order != null)
                            <span class="badge badge-danger">{{ $today_order }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 1||auth()->user()->role_employee_id == 4)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมไทย
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'thai-dessert.index'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThaiDassert"
               aria-expanded="true" aria-controls="collapseThaiDassert">
                <i class="fas fa-stroopwafel"></i>
                <?php

                $orders = \App\Models\Order::query()
                    ->where('order_status','>=','1')
                    ->where('order_status','<=','2')
                    ->get();

                $arr_thai_orders = [];
                foreach ($orders as $order)
                {
                    $orderDetails = \App\Models\OrderDetail::query()
                        ->where('role_employee_id',4)
                        ->where('order_id',$order->id)
                        ->get();

                    $total_qty = 0;
                    foreach ($orderDetails as $orderDetail )
                    {
                        $total_qty += $orderDetail->product_qty;
                    }

                    if ( $total_qty != 0)
                    {
                        array_push($arr_thai_orders,array(
                            'order_id' => $order->id,
                            'shop_name' => $order->user->shop_name,
                            'user_type' => $order->user->role->name,
                            'total_qty' => $total_qty,
                            'created_at' =>$order->created_at
                        ));
                    }
                }

                $thai_order = count($arr_thai_orders);
                ?>
                <span>
                    รายการสั่งขนมไทย
                    @if( $thai_order != null)
                        <span class="badge badge-danger">{{ $thai_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseThaiDassert"
                 class="collapse {{ Route::currentRouteName() === 'thai-dessert.index'? 'show' : null }}"
                 aria-labelledby="headingThaiDassert" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'thai-dessert.index'? 'active' : null }}"
                       href="{{ route('thai-dessert.index') }}">รายการสั่งซื้อ
                        @if( $thai_order != null)
                            <span class="badge badge-danger">{{ $thai_order }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 1||auth()->user()->role_employee_id == 5)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมโรล
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'role-dessert.index'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleDessert"
               aria-expanded="true" aria-controls="collapseRoleDessert">
                <i class="fas fa-stroopwafel"></i>
                <?php

                $orders = \App\Models\Order::query()
                    ->where('order_status','>=','1')
                    ->where('order_status','<=','2')
                    ->get();

                $arr_thai_orders = [];
                foreach ($orders as $order)
                {
                    $orderDetails = \App\Models\OrderDetail::query()
                        ->where('role_employee_id',5)
                        ->where('order_id',$order->id)
                        ->get();

                    $total_qty = 0;
                    foreach ($orderDetails as $orderDetail )
                    {
                        $total_qty += $orderDetail->product_qty;
                    }

                    if ( $total_qty != 0)
                    {
                        array_push($arr_thai_orders,array(
                            'order_id' => $order->id,
                            'shop_name' => $order->user->shop_name,
                            'user_type' => $order->user->role->name,
                            'total_qty' => $total_qty,
                            'created_at' =>$order->created_at
                        ));
                    }
                }

                $role_order = count($arr_thai_orders);
                ?>
                <span>
                    รายการสั่งซื้อขนมโรล
                     @if( $role_order != null)
                        <span class="badge badge-danger">{{ $role_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseRoleDessert"
                 class="collapse {{ Route::currentRouteName() === 'role-dessert.index'? 'show' : null }}"
                 aria-labelledby="headingRoleDessert" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'role-dessert.index'? 'active' : null }}"
                       href="{{ route('role-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $role_order != null)
                            <span class="badge badge-danger">{{ $role_order }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 1||auth()->user()->role_employee_id == 6)
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

                $orders = \App\Models\Order::query()
                    ->where('order_status','>=','1')
                    ->where('order_status','<=','2')
                    ->get();

                $arr_thai_orders = [];
                foreach ($orders as $order)
                {
                    $orderDetails = \App\Models\OrderDetail::query()
                        ->where('role_employee_id',6)
                        ->where('order_id',$order->id)
                        ->get();

                    $total_qty = 0;
                    foreach ($orderDetails as $orderDetail )
                    {
                        $total_qty += $orderDetail->product_qty;
                    }

                    if ( $total_qty != 0)
                    {
                        array_push($arr_thai_orders,array(
                            'order_id' => $order->id,
                            'shop_name' => $order->user->shop_name,
                            'user_type' => $order->user->role->name,
                            'total_qty' => $total_qty,
                            'created_at' =>$order->created_at
                        ));
                    }
                }

                $brownie_order = count($arr_thai_orders);
                ?>
                <span>
                    รายการสั่งซื้อขนมบราวนี่
                     @if( $role_order != null)
                        <span class="badge badge-danger">{{ $brownie_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseBrownies"
                 class="collapse {{ Route::currentRouteName() === 'brownie-dessert.index'? 'show' : null }}"
                 aria-labelledby="headingBrownies" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'brownie-dessert.index'? 'active' : null }}"
                       href="{{ route('brownie-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $brownie_order != null)
                            <span class="badge badge-danger">{{ $brownie_order }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 1||auth()->user()->role_employee_id == 7)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมเค้ก
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'cake-dessert.index'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCake"
               aria-expanded="true" aria-controls="collapseCake">
                <i class="fas fa-stroopwafel"></i>
                <?php
                $orders = \App\Models\Order::query()
                    ->where('order_status','>=','1')
                    ->where('order_status','<=','2')
                    ->get();

                $arr_thai_orders = [];
                foreach ($orders as $order)
                {
                    $orderDetails = \App\Models\OrderDetail::query()
                        ->where('role_employee_id',7)
                        ->where('order_id',$order->id)
                        ->get();

                    $total_qty = 0;
                    foreach ($orderDetails as $orderDetail )
                    {
                        $total_qty += $orderDetail->product_qty;
                    }

                    if ( $total_qty != 0)
                    {
                        array_push($arr_thai_orders,array(
                            'order_id' => $order->id,
                            'shop_name' => $order->user->shop_name,
                            'user_type' => $order->user->role->name,
                            'total_qty' => $total_qty,
                            'created_at' =>$order->created_at
                        ));
                    }
                }

                $cake_order = count($arr_thai_orders);
                ?>
                <span>
                    รายการสั่งซื้อขนมเค้ก
                    @if( $cake_order != null)
                        <span class="badge badge-danger">{{ $cake_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseCake"
                 class="collapse {{ Route::currentRouteName() === 'cake-dessert.index'? 'show' : null }}"
                 aria-labelledby="headingCake" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'cake-dessert.index'? 'active' : null }}"
                       href="{{ route('cake-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $cake_order != null)
                            <span class="badge badge-danger">{{ $cake_order }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </li>
@endif
@if(auth()->user()->role_employee_id == 1||auth()->user()->role_employee_id == 8)
    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ห้องขนมคุกกี้
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() === 'cookie-dessert.index'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCookie"
               aria-expanded="true" aria-controls="collapseCookie">
                <i class="fas fa-stroopwafel"></i>
                <?php
                $orders = \App\Models\Order::query()
                    ->where('order_status','>=','1')
                    ->where('order_status','<=','2')
                    ->get();

                $arr_thai_orders = [];
                foreach ($orders as $order)
                {
                    $orderDetails = \App\Models\OrderDetail::query()
                        ->where('role_employee_id',8)
                        ->where('order_id',$order->id)
                        ->get();

                    $total_qty = 0;
                    foreach ($orderDetails as $orderDetail )
                    {
                        $total_qty += $orderDetail->product_qty;
                    }

                    if ( $total_qty != 0)
                    {
                        array_push($arr_thai_orders,array(
                            'order_id' => $order->id,
                            'shop_name' => $order->user->shop_name,
                            'user_type' => $order->user->role->name,
                            'total_qty' => $total_qty,
                            'created_at' =>$order->created_at
                        ));
                    }
                }

                $cookie_order = count($arr_thai_orders);
                ?>
                <span>
                    รายการสั่งซื้อขนมคุกกี้
                    @if( $cookie_order != null)
                        <span class="badge badge-danger">{{ $cookie_order }}</span>
                    @endif
                </span>
            </a>
            <div id="collapseCookie"
                 class="collapse {{ Route::currentRouteName() === 'cookie-dessert.index'? 'show' : null }}"
                 aria-labelledby="headingCookie" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'cookie-dessert.index'? 'active' : null }}"
                       href="{{ route('cookie-dessert.index') }}">
                        รายการสั่งซื้อ
                        @if( $cookie_order != null)
                            <span class="badge badge-danger">{{ $cookie_order }}</span>
                        @endif
                    </a>
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
