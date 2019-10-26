<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title')-{{ config('app.name','khai') }}</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{ asset('assets/backend/styles/style.min.css') }}">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{ asset('assets/backend/fonts/material-design/css/materialdesignicons.css') }}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{ asset('assets/backend/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{ asset('assets/backend/plugin/waves/waves.min.css') }}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{ asset('assets/backend/plugin/sweet-alert/sweetalert.css') }}">
	
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('assets/backend/plugin/iCheck/skins/square/blue.css') }}">

	<!-- Toastr -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

	@stack('css')

</head>