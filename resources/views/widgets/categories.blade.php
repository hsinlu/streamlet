<div class="widget widget-categories">
    <h4>
        <i class="fa fa-folder-o"></i>
        {{ trans('strings.widgets.categories_title') }}
    </h4>
    <hr/>
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