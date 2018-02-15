<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ url('manual/login') }}">Login</a></li>
                        <li><a href="{{ url('manual/register') }}">Register</a></li>
                    @else
                        <div class="row">
                            <div class="col-sm-2">
                                {!! link_to_route('home','Home',null,['class'=>'fa fa-btn fa-user']) !!}
                            </div>
                            <div class="col-sm-2">
                             <a href="{{ url('news') }}"><i class="fa fa-btn fa-user">News</i> </a>
                            </div>

                            <div class="col-sm-2">
                                {!! link_to_route('profile.show','Profile',[Auth::user()->email],['class'=>'fa fa-btn fa-user']) !!}
                            </div>
                            <div class="col-sm-2">
                                <img src="{!!'upload/'. Auth::user()->profile_img!!}" style="width: 32px; height: 32px; border-radius: 50%">
                            </div>
                            <div class="col-sm-4">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <!-- Logout Manual -->
                                        <li>
                                            <a href="{!! url('manual/logout') !!}">manual Logout</a>
                                        </li>

                                    </ul>
                                </li>
                            </div>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @include('layouts.errorr')
    @yield('content')
</div>

<!-- Scripts -->
@yield('js')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
