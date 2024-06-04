<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sena Monitoring || </title>
</head>
<link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.min.css')}}">
<body>

@include('layout.navbar')
<div class="mt-5 pt-3">
    @yield('content')
</div>

</body>
<script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
</html>
