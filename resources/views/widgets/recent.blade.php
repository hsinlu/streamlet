<div class="widget widget-recent">
    <div class="header clearfix">
        <h3 class="header-title pull-left">
            {{ trans('strings.widgets.recent_title') }}
        </h3>
        <a class="header-title pull-right" href="articles">more</a>
    </div>
    <ul>
        @foreach($articles as $index => $article)
        <li class="clearfix">
            <button class="pull-left">
                <span>{{ $index + 1 }}</span>
            </button>
            <div>
                <h4>
                    <a href="{{ url('articles', [$article->slug]) }}">   
                        {{ $article->title }}
                    </a>
                </h4>
                <a href="{{ url('categories', [$article->category->slug]) }}">{{ $article->category->name }}</a>
                @if($index + 1 < count($articles))
                    <hr>
                @endif
            </div>
        </li>
        @endforeach
    </ul>
</div>