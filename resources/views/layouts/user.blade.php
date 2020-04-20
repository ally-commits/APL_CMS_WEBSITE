<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>APL</title> 

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        @yield("css")
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <body data-topbar="colored"> 
        @if(Session::has('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Heads up!</strong> {{ Session::get('message') }}
            </div>
        @endif 
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex bg-primary"> 
                        <div class="navbar-brand-box bg-primary">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm text-white">
                                    APL
                                </span>
                                <span class="logo-lg text-white">
                                    Aloysius Premier League
                                </span>
                            </a> 
                        </div>
                    </div>

                    <div class="d-flex"> 

                        <div class="dropdown d-inline-block">
                            @guest
                                <a href="/login" class="text-white mx-1">Owner Login</a>
                                <a href="/teams" class="text-white mx-1">Teams</a>
                                <a href="/player-register" class="text-white mx-1">Register player</a>
                            @else
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset(Auth::user()->image) }}" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"> 
                                <a href="/dashboard" class="dropdown-item"><i class="mdi mdi-map"></i> Dashboard</a>
                                <a href="/player-register" class="dropdown-item"><i class="mdi mdi-align-horizontal-center"></i> Register Player</a>
                                <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> 
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endif
                        </div>
            
                    </div>
                </div>
            </header> 
            <div style="margin-top: 60px;">
                @yield('content')  
            </div> 
        </div>
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        @yield("js")
        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
    </html>
