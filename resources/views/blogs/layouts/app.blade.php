<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel blogs</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/">
            Laravel
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/blogs/index">მთავარი</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogs/create">დამატება</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogs/date">ამ თვის პოსტები</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogs/in">პოსტები 1,5,19</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogs/trash">წაშლილები</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if( Session::has( 'success' ))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>გილოცავთ!</strong> {{ Session::get( 'success' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif( Session::has( 'warning' ))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>შეცდომა!</strong> {{ Session::get( 'warning' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
