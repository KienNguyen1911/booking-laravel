<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="icon" type="image/png" href="admin/img/favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/style.css') }}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @yield('title')

</head>

<body>
    @include('client.layout.header')

    @yield('index')
    @yield('about')
    @yield('contact')
    @yield('services')
    @yield('elements')

    @yield('motels')
    @yield('motel_details')
    @yield('booking')

    @yield('vnpay_pay')
    @yield('return_vnpay')

    @yield('order_list')
    @yield('order_detail')
    @yield('order_owner')

    @include('client.layout.footer')
</body>

</html>
