<div class="widget widget-tags">
    <h4>
        <i class="fa fa-tags fa-2"></i>
        {{ trans('strings.widgets.tag_title') }}
    </h4>
    <hr/>
    <div>
        @foreach($tags as $tag)
            <a href="{{ url('tags', [$tag->slug]) }}">{{ $tag->name }}</a>
            <span class="badge">{{ $tag->articles_count }}</span>
        @endforeach
    </div>
</div>