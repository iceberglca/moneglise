<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'laravel') }}</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/lib/datatable/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/lib/datatable/buttons.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ URL::asset('assets/scss/style.css') }}">
    <link href="{{ URL::asset('assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.fileupload.css') }}">



    <script src="{{ URL::asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
    <script src="{{URL::asset('assets/js/main.js')}}"></script>
    <script src="{{URL::asset('js/popper.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-select.js')}}"></script>
    <script src="{{ URL::asset('js/select2.full.min.js') }}"></script>

</head>
<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"> {{ config('app.name', 'laravel') }}</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Tableau de bord </a>
                </li>
                <h3 class="menu-title">Paramétrages</h3><!-- /.menu-title -->
                <li class="menu-item ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Gestion utilisateurs</a>
                </li>
                <h3 class="menu-title">Mes Eglises</h3><!-- /.menu-title -->
                <li @yield('eglises')>
                    <a href="{{ route('eglises') }}" class=""> <i class="menu-icon fa fa-institution"></i>Lister les églises</a>
                </li>


                <h3 class="menu-title">Mes fidèles</h3><!-- /.menu-title -->

                <li @yield('fideles')>
                    <a href="{{route('fideles')}}" > <i class="menu-icon fa fa-address-book"></i>Lister les fidèles</a>
                </li>
                <li @yield('gestion_fidele')>
                    <a href="{{route('gestion_fidele')}}"> <i class="menu-icon fa fa-address-book-O"></i>Ajouter un fidèle </a>
                </li>
                <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">


                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{\Illuminate\Support\Facades\Auth::user()->nom." ".\Illuminate\Support\Facades\Auth::user()->prenom}}
                    </a>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->



    <div class="content mt-3" style="text-align: center">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif()
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif()
        @yield('content')
    </div> <!-- .content -->
</div><!-- /#right-panel -->


<!-- Right Panel -->

</body>
</html>
