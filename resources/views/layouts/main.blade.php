<!DOCTYPE HTML>
<html class="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('/img/logotitle.png') }}">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">


    <!--script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Athiti:300|K2D:100|Mitr:200" rel="stylesheet" type="text/css">
    {{--font-family: 'Athiti', sans-serif;--}}
    {{--font-family: 'K2D', sans-serif;--}}


</head>

<body class="body">
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right link-login">
            @auth
            <a href="{{ url('/home') }}" class="linkslog ">Home</a>
            @else
                <a href="{{ route('login') }}" class="linkslog ">ล็อกอิน</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="linkslog ">สมัครสมาชิก</a>
                @endif
                @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            คิดถึงเบเกอรี่
        </div>

        <div style="margin-top: 30px" >
            <a href="#" class="links">ข้อมูลขนม</a>
            <a href="#" class="links">ข่าวสาร</a>
            <a href="#" class="links">เกี่ยวกับเรา</a>
            <a href="#" class="links">ติดต่อเรา</a>
        </div>
    </div>
</div>
@yield('content')
@include('frontend.index.footer')


</body>
</html>
</html>