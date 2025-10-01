<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>{{ __('dashboard.dashboard') }} | @yield('title')</title>
  <link rel="apple-touch-icon" href="{{ asset('assets/assets-back') }}/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets-back') }}/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
  <style>
        body, h1, h2, h3, h4, h5, h6, label, input, button, .form-check-label {
            font-family: 'Tajawal', sans-serif !important;
        }
  </style>
  @php
     $cssStyle = LaravelLocalization::getCurrentLocale() == 'en' ? 'css' : 'css-rtl' ;
  @endphp
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/{{ $cssStyle }}/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/{{ $cssStyle }}/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/{{ $cssStyle }}/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/{{ $cssStyle }}/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/{{ $cssStyle }}/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets-back') }}/{{ $cssStyle }}/style.css">
  <!-- END Custom CSS-->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

   @stack('css')
</head>
