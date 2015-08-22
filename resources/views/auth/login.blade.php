<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <title>Sign in {{ setting_value('title') }}</title>
    <meta name="description" content="{{ setting_value('description') }}"/>
    <meta name="keywords" content="{{ setting_value('keywords') }}"/>
    <link rel="stylesheet" href="/css/login.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('particles.errors', ['errors' => $errors])
<div class="container-fuild">
    <div class="login-box">
        <form class="form-inline" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <span class="email">
                    <input type="email" class="form-control no-border" name="email" placeholder="Email Address" value="{{ old('email') }}" required/>
                </span>
            </div>

            <div class="form-group">
                <span class="password">
                    <input type="password" class="form-control no-border" name="password" placeholder="Password" value="{{ old('password') }}" required/>
                </span>
            </div>

            <br/>
            <div class="checkbox remember-me">
                <label>
                    <input type="checkbox" name="remember"> {{ trans('strings.remember_me') }}
                </label>
            </div>
            
            <br/>
            <div class="form-group form-actions">
                <button type="submit" class="btn btn-primary">{{ trans('strings.login') }}</button>
                <a href="{{ url('/password/email') }}">{{ trans('strings.forgotten_password') }}</a>
            </div>
        </form>
    </div>
</div>
</body>