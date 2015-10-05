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

<div class="container-float">
    @include('particles.navbar')
    <div class="content">
        @yield('content')

        <div class="content-footer row">
            <div class="col-md-6">
                @include('widgets.tags')
            </div>
            <div class="col-md-6">
                @include('widgets.categories')
            </div>
        </div>
        {{-- @include('particles.footer') --}}
    </div>
    <div class="sidebar">
        <div class="sidebar-content" data-scroll="fixed-bottom">
            {{-- @include('widgets.profile') --}}
            @include('widgets.tags')
            @include('widgets.categories')
            @include('widgets.recent')
        </div>
    </div>
</div>
<div class="toolbar toolbar-right-bottom">
    <div data-scroll="scroll-to-top" class="scroll-to-top">
        <i class="fa fa-angle-up"></i>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/streamlet.js"></script>
</body>
</html>