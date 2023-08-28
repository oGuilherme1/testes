<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="css/layout.css">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<nav class="nav navbar navbar-expand-md fixed-top navbar-light bg-light app_header">
    <a href="#sidr_menu" id="sidr-button" class="navbar-brand text-primary pl-md-3">
        <i class="fa fa-bars fa-fw text-secondary"></i>
    </a>

    <li class="nav-item mr-2 d-none d-sm-none d-md-block d-lg-block d-xl-block">
        <span class="d-none d-lg-inline-block d-xl-inline-block">{{config('app.name')}}</span>
    </li>

    <li class="nav-item dropdown active ml-auto">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/logout">Sair</a>
            {{--<a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>--}}
        </div>
    </li>


    {{--<li class="nav-item ml-auto">
        <a class="nav-link active" href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
    </li>--}}

</nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>

