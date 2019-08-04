<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('/img/logotitle.png') }}">

    <!-- Bootstrap CSS File -->
    <link href="avilon/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="avilon/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="avilon/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="avilon/lib/aos/aos.css" rel="stylesheet">
    <link href="avilon/lib/magnific-popup/magnific-popup.css" rel="stylesheet">



    <!--script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>


    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Athiti:300|K2D:100|Mitr:200" rel="stylesheet" type="text/css">
    {{--font-family: 'Athiti', sans-serif;--}}
    {{--font-family: 'K2D', sans-serif;--}}

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">
    {{--<!-- Custom styles for this template-->--}}
    {{--<link href="{{asset('sb-admin2/css/sb-admin-2.min.css')}}" rel="stylesheet">--}}


</head>

<body>

@include('frontend.partials.navbar')
@yield('content')

@include('frontend.partials.footer')

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@include('frontend.layouts.script')
@stack('script')


</body>
</html>
