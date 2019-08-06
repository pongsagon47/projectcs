<header id="header">
    <div class="container">

        <img  src="{{asset('img/logoapp.png')}}" alt="">
        <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto">คิดถึงเบเกอรี่</a></h1>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a class="nav-index-link {{ Route::currentRouteName() == 'kidthuang.index'?'active':'' }}" href="{{route('kidthuang.index')}}">หน้าหลัก</a></li>
                <li><a class="nav-index-link {{Route::currentRouteName() == 'kidthuang.about-us'?'active':''}}" href="{{route('kidthuang.about-us')}}">เกี่ยวกับเรา</a></li>
                <li><a class="nav-index-link" href="#features">ข่าวสาร</a></li>
                <li><a class="nav-index-link" href="#pricing">ข้อมูลขนม</a></li>
                <li><a class="nav-index-link {{Route::currentRouteName() == 'kidthuang.contact-us'?'active':''}}" href="{{route('kidthuang.contact-us')}}">ติดต่อเรา</a></li>
                @if (Route::has('login'))
                    <li>
                        @auth
                            <a class="nav-login-link" href="{{ url('/home') }}" >Home</a>
                        @else
                            <a class="nav-login-link" href="{{ route('login') }}" >เข้าสู่ระบบ</a>
                        @endauth
                    </li>
                @endif
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

