<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <title>{{ setting_value('title') }}</title>
    <meta name="description" content="{{ setting_value('description') }}"/>
    <meta name="keywords" content="{{ setting_value('keywords') }}"/>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/streamlet-admin.css">
    @yield('header')
</head>
<body>
@include('flash::message')
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
                {{ setting_value('title') }}
            </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="{{ is_pattern(['admin/articles/hub', 'admin/articles/hub/*']) ? 'active' : '' }}">
                        <a href="{{ url('admin/articles/hub/') }}"><i class="fa fa-list-alt"></i>Hub</a>
                </li>
                <li class="{{ is_pattern(['admin/articles/create', 'admin/articles/create/*']) ? 'active' : '' }}">
                    <a href="{{ url('admin/articles/create') }}"><i class="fa fa-plus"></i>{{ trans('strings.admin.navbar.new_article') }}</a>
                </li>
                <li class="{{ is_pattern(['admin/settings/*']) ? 'active' : '' }}">
                    <a href="{{ url('admin/settings/general') }}"><i class="fa fa-cogs"></i>{{ trans('strings.admin.navbar.setting') }}</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
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
    @include('particles.errors', ['errors' => $errors])
    @yield('content')
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/streamlet-admin.js"></script>
@yield('scripts')
</body>
</html>