<div class="widget widget-tags">
    <div class="header clearfix">
        <h3 class="header-title pull-left">
            {{ trans('strings.widgets.tag_title') }}
        </h3>    
    </div>
    <div>
        @foreach($tags as $tag)
            {{-- <a href="{{ url('tags', [$tag->slug]) }}">{{ $tag->name }}</a> --}}
            {{-- <span class="badge">{{ $tag->articles_count }}</span> --}}
            <a class="btn btn-default btn-tag" href="{{ url('tags', [$tag->slug]) }}">{{ $tag->name }}</a>
            {{-- <span class="badge">{{ $tag->articles_count }}</span> --}}
        @endforeach
    </div>
</div>