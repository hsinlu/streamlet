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
    <link rel="stylesheet" href="/css/streamlet.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('flash::message')
@include('particles.errors')
<div class="navbar navbar-default navbar-fixed-top toggle-visibility-navbar" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                {{ setting_value('title') }} <br/>
                <small>{{ setting_value('subtitle') }}</small>
            </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}">{{ trans('strings.home') }}</a>
                </li>
                <li>
                    <a href="{{ url('articles') }}">{{ trans('strings.articles') }}</a>
                </li>
                <li>
                    <a href="{{ url('knots') }}">Knots</a>
                </li>
                <li>
                    <a href="{{ url('projects') }}">{{ trans('strings.projects') }}</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="{{ url('admin/articles/hub') }}">Hub</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                           <img class="img-circle avatar" src="{{ asset(setting_value('avatar')) }}">
                           {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/settings/profile') }}">{{ trans('strings.setting') }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}">{{ trans('strings.logout') }}</a></li>
                        </ul>
                    </li>
                @endif
                <li>
                    <form action="{{ url('search') }}" class="form-inline">
                        <input name="words" type="text" placeholder=" {{ trans('strings.tips.input_search_words') }}" class="form-control search">
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @yield('content')
        </div>
        <div class="col-md-4">
            <div class="widget widget-profile">
                <div class="cover" style="background: url('{{ asset(setting_value('cover')) }}') no-repeat 10% center;">
                    <div class="avatar">
                        <img class="img-circle" src="{{ asset(setting_value('avatar')) }}">
                    </div>
                </div>
                <div class="bio">
                    <h4 class="text-center">
                        <a href="{{ url('/') }}">{{ setting_value('name') }}</a></h4>
                    <hr/>
                    <p class="text-center">
                        {!! setting_value('bio') !!}
                    </p>
                </div>
            </div>
            @include('widgets.categories')
            @include('widgets.tags')
            @include('widgets.recent')
        </div>
        <div class="clearfix visible-xs-block"></div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copyright">
                    <p> &#169; Copyright - hsinlu.si</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fllowme">
                    <ul class="list-inline">
                        <li><a href=""><i class="fa fa-qq fa-3"></i></a></li>
                        <li><a href=""><i class="fa fa-weibo fa-3"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="toolbar toolbar-right-bottom">
    <div class="scroll-to-top">
        <i class="fa fa-angle-up"></i>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/streamlet.js"></script>
</body>
</html>