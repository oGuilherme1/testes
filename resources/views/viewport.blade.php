<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Bloqueio Acesso">
    <title>GPE Cloud - {{config('app.APP_NAME')}}</title>
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Biblioteca CSS Sidr Menu -->
    <link rel="stylesheet" href="{{asset('css/jquery.sidr.light.min.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/main.min.css')}}">

</head>

<body>

<b>VIEWPORT AQUI</b>
<a href="/logout">Logout</a>




@include('admin.layout.footer')
<!-- end -->

<script src="{{asset('layout/assets/js/main.min.js')}}"></script>
<script src="js/app.js"></script>

</body>

</html>