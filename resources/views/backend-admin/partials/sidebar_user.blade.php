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

        <li class="nav-item {{ Route::currentRouteName() === 'product_category.index'||Route::currentRouteName() === 'product_category.create'
    ||Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product_category.edit'||Route::currentRouteName() === 'product.show'
    ||Route::currentRouteName() === 'product.edit'||Route::currentRouteName() === 'product.create'||Route::currentRouteName() === 'product.search' ? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
               aria-expanded="true" aria-controls="collapseProduct">
                <i class="fas fa-shopping-cart"></i>
                <span>การจัดการสินค้า</span>
            </a>
            <div id="collapseProduct" class="collapse {{ Route::currentRouteName() === 'product_category.index'||Route::currentRouteName() === 'product_category.create'
        ||Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product_category.edit'||Route::currentRouteName() === 'product.show'
        ||Route::currentRouteName() === 'product.edit'||Route::currentRouteName() === 'product.create'||Route::currentRouteName() === 'product.search' ? 'show' : null }}"
                 aria-labelledby="headingProduct" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">จัดการรายการขนม</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'product.index'||Route::currentRouteName() === 'product.show'||Route::currentRouteName() === 'product.edit'
                 ||Route::currentRouteName() === 'product.search' ? 'active' : null }}"
                       href="{{route('product.index')}}">ข้อมูลรายการขนม</a>
                </div>
            </div>
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
        <li class="nav-item {{ Route::currentRouteName() === 'order-today.index'? 'active' : null }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrderToday"
               aria-expanded="true" aria-controls="collapseOrderToday">
                <i class="fas fa-fw fa-cog"></i>
                <span>รายการสั่งซื้อวันนี้</span>
            </a>
            <div id="collapseOrderToday"
                 class="collapse {{ Route::currentRouteName() === 'order-today.index'? 'show' : null }}"
                 aria-labelledby="headingOrderToday" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">รายการสั่งซื้อวันนี้ :</h6>
                    <a class="collapse-item {{ Route::currentRouteName() === 'order-today.index'? 'active' : null }}"
                       href="{{ route('order-today.index') }}">รายการสั่งซื้อ</a>
                    {{--                    <a class="collapse-item" href="cards.html">Cards</a>--}}
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
