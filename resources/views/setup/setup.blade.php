<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <title>Setup</title>
    <meta name="description" content="{{ setting_value('description') }}"/>
    <meta name="keywords" content="{{ setting_value('keywords') }}"/>
    <link rel="stylesheet" href="/css/setup.css">

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
    <div class="setup-box">
        <form method="POST" action="{{ url('setup') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="name">Your Name</label>
                <input id="name" type="text" class="form-control no-border" name="name" placeholder="Your Name" value="{{ old('name') }}" required/>
            </div>

            <div class="form-group">
                <label for="bio">Your Bio</label>
                <textarea id="bio" name="bio" class="form-control no-border" placeholder="Your Bio" rows="3" required>{{ old('bio') }}</textarea>
            </div>

            <div class="form-group">
                <label for="title">Website Title</label>
                <input id="title" type="text" class="form-control no-border" name="title" placeholder="Website Title" value="{{ old('title') }}" required/>
            </div>

            <div class="form-group">
                <label for="subtitle">Website Subtitle</label>
                <input id="subtitle" type="text" class="form-control no-border" name="subtitle" placeholder="Website Subtitle" value="{{ old('subtitle') }}" required/>
            </div>

            <div class="form-group">
                <label for="keywords">Website Keywords</label>
                <textarea id="keywords" name="keywords" class="form-control no-border" placeholder="Website Keywords" rows="3" required>{{ old('keywords') }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">Website Description</label>
                <textarea id="description" name="description" class="form-control no-border" placeholder="Website Description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group form-actions">
                <button type="submit" class="btn btn-primary">{{ trans('strings.setup') }}</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>