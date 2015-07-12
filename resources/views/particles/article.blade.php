<article class="widget widget-article article">
    <header class="article-header">
        <h2 class="article-title">
            <a href="{{ url('articles', [$article->slug]) }}" rel="bookmark">{{ $article->title }}</a>
        </h2>

        <div class="article-meta">
            <a href="{{ url('date', [Carbon\Carbon::parse($article->published_at)->toDateString()]) }}">
                <i class="fa fa-calendar-o"></i>
                <time class="entry-date published" pubdate>{{ $article->published_at }}</time>
            </a>
            <a href="{{ url('categories', [$article->category->slug]) }}">
                <i class="fa fa-folder-o"></i>
                {{ $article->category->name }}
            </a>

            <div>
                <i class="fa fa-tag"></i>
                @foreach($article->tags as $tag)
                    <a href="{{ url('tags', [$tag->slug]) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </header>

    @if(isset($article->cover))
        <div class="article-thumbnail reveal-on-scroll" data-animation="fadeInUp 1.5s">
            <a href="{{ url('articles', [$article->slug]) }}">
                <img src="{{ $article->cover }}"
                     alt="{{ $article->title }}"/>
            </a>
        </div>
    @endif

    <div class="article-content">
        <p>
            {!! $bio ? str_limit(strip_tags($article->body, 500)) : $article->body !!}
        </p>
    </div>

    <div class="article-actions">
        @if($bio)
            <a class="read-more pull-left" href="{{ url('articles', [$article->slug]) }}">
                READ MORE
            </a>
        @endif
        <div class="share pull-right">
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
</article>