<div class="widget widget-recent">
    <h4>
        <i class="fa fa-fire fa-2"></i>
        {{ trans('strings.widgets.recent_title') }}
    </h4>
    <hr/>
    <ul>
        @foreach($articles as $article)
        <li>
            <i class="fa fa-file-o"></i>
            <a href="{{ url('articles', [$article->slug]) }}">   
                {{ $article->title }}
            </a>
        </li>
        @endforeach
    </ul>
</div>