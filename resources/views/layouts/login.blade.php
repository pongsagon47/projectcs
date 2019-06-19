<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('/img/logotitle.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('sb-admin2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('sb-admin2/css/sb-admin-2.min.css')}}" rel="stylesheet">
    {{--<link href="css/custom.css" rel="stylesheet" type="text/css">--}}

</head>

<body class="bg-gradient-warning">

@yield('content')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('sb-admin2/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('sb-admin2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('sb-admin2/js/sb-admin-2.min.js')}}"></script>

{{--Cleave.js--}}
<script src="{{ asset('cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('cleave.js/dist/addons/cleave-phone.th.js') }}"></script>

@stack('script')

</body>

</html>
