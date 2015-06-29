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
    <link rel="stylesheet" href="{{ asset('css/streamlet.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('particles.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @yield('content')
        </div>
        <div class="col-md-4">
            <div class="widget widget-profile">
                <div class="cover">
                    <div class="avatar">
                        <img class="img-circle" src="{{ asset('images/logo.png') }}">
                    </div>
                </div>
                <div class="bio">
                    <h4 class="text-center">
                        <a href="{{ url('/') }}">{{ setting_value($settings, 'name') }}</a></h4>
                    <hr/>
                    <p class="text-center">
                        {!! setting_value($settings, 'bio') !!}
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
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>