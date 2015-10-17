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

<div class="article-full-container">
	@include('particles.navbar')

	<article class="article-full">
		<header class="header">
	        <div class="avatar pull-left">
	            <img class="img-circle" src="{{ asset(setting_value('avatar')) }}">
	        </div>

	        <div class="meta">
	            <div class="meta-title">
	                <a href="/">{{ $article->user->name }}</a>
	                in 
	                <a href="{{ url('categories', [$article->category->slug]) }}">{{ $article->category->name }}</a>
	            </div>
	            <div class="time">
	                <time class="entry-date published" pubdate>{{ Carbon\Carbon::parse($article->published_at)->diffForHumans() }}</time>
	            </div>
	        </div>
	    </header>

	    @if(isset($article->cover))
	        <div class="cover">
                <img src="{{ $article->cover }}"
                     alt="{{ $article->title }}"/>
	        </div>
	    @endif

	    <h4 class="title">
			{{ $article->title }}
	    </h4>

	    <div class="content">
	        <p>
	            {!! $article->body !!}
	        </p>
	    </div>

		<div class="tags">
			@foreach($article->tags as $tag)
	            <a class="btn btn-default btn-tag" href="{{ url('tags', [$tag->slug]) }}">{{ $tag->name }}</a>
	        @endforeach
		</div>

	    <div class="actions">
	        <div class="share">
	            <span class="text-uppercase">share</span>
	            <a href="http://v.t.sina.com.cn/share/share.php?url={{ url('articles', [$article->slug]) }}&title={{ $article->title }}" target="_blank">
	                <i class="fa fa-weibo"></i>
	            </a>
	            <a href="http://v.t.qq.com/share/share.php?url={{ url('articles', [$article->slug]) }}&title={{ $article->title }}" target="_blank">
	                <i class="fa fa-tencent-weibo"></i>
	            </a>
	            <a href="https://twitter.com/share?text={{ $article->title }}&url={{ url('articles', [$article->slug]) }}" target="_blank">
	                <i class="fa fa-twitter"></i>
	            </a>
	            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('articles', [$article->slug]) }}" target="_blank">
	                <i class="fa fa-facebook-official"></i>
	            </a>
	            <a href="https://plus.google.com/share?url={{ url('articles', [$article->slug]) }}" target="_blank">
	                <i class="fa fa-google-plus"></i>
	            </a>
	        </div>
	    </div>

	    <div class="profile-container">
	    	<div class="profile">
		    	<div class="avatar pull-left">
		            <img class="img-circle" src="{{ asset(setting_value('avatar')) }}">
		        </div>

		        <div class="meta">
		            <h5>
            			<a href="{{ url('/') }}">{{ setting_value('name') }}</a>
            		</h5>

		            <p class="meta-title">
		            	{!! setting_value('bio') !!}
		            </p>
		        </div>
		    </div>
	    </div>

	</article>
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