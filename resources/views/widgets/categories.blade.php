<div class="widget widget-categories">
    <div class="header clearfix">
        <h3 class="header-title pull-left">
            {{ trans('strings.widgets.categories_title') }}
        </h3>    
    </div>
    <ul>
        @foreach($categories as $category)
        <li>
            <i class="fa fa-angle-right"></i>
            <a href="{{ url('categories', [$category->slug]) }}">   
                {{ $category->name }}
                <span class="badge">{{ $category->articles_count }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>