<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/grayscale/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/grayscale/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/grayscale/css/grayscale.css') }}">


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->





</head>
<body id="page-top">

@yield('body')



<script src="{{ asset('vendor/grayscale/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/grayscale/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('vendor/grayscale/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('vendor/grayscale/js/grayscale.js') }}"></script>




</body>
</html>
