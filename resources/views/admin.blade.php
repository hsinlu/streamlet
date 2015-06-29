<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <title>{{ setting_value($settings, 'title') }}</title>
    <meta name="description" content="{{ setting_value($settings, 'description') }}"/>
    <meta name="keywords" content="{{ setting_value($settings, 'keywords') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('header')
</head>
<body>
<div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="banner">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                {{ setting_value($settings, 'title') }}
            </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="{{ is_pattern(['articles/create', 'articles/create/*']) ? 'active' : '' }}">
                    <a href="{{ url('articles/create') }}"><i class="fa fa-plus"></i>{{ trans('strings.admin.navbar.new_article') }}</a>
                </li>
                <li>
                    <a href="{{ url('setup') }}"><i class="fa fa-cog"></i>{{ trans('strings.admin.navbar.setting') }}</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="{{ is_pattern(['dashboard', 'dashboard/*']) ? 'active' : '' }}">
                        <a href="{{ url('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-user"></i>
                           {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('auth/logout') }}">退出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
</div>
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>