<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('meta_title', 'Xác thực người dùng')</title>
    <link rel="stylesheet" href="{{ asset('assets/client/vendor/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">

    @stack('stylesheet')

</head>
<body>
    @yield('content')
    <link rel="stylesheet" href="{{ asset('assets/client/vendor/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}">

    @stack('javascript')

</body>
</html>