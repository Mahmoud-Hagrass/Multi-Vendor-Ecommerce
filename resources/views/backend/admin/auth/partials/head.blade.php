@php
    $cssStyle = LaravelLocalization::getCurrentLocale() == 'en' ? 'css' : 'css-rtl' ;
@endphp
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>{{ config('app.name') }} | @yield('title')</title>
  <link rel="apple-touch-icon" href="{{ asset('assets/assets-back')}}/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets-back')}}/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back')}}/{{ $cssStyle }}/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back')}}/{{ $cssStyle }}/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back')}}/{{ $cssStyle }}/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back')}}/{{ $cssStyle }}/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back')}}/{{ $cssStyle }}/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back')}}/{{ $cssStyle }}/style.css">
  <!-- END Custom CSS-->
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- jQuery (required for toastr) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
