<div class="widget widget-categories">
    <h4>
        <i class="fa fa-folder-o"></i>
        {{ trans('strings.category') }}
    </h4>
    <hr/>
    <ul>
        @foreach($categories as $category)
        <li>
            <i class="fa fa-angle-right"></i>
            <a href="{{ url('categories/' . $category->slug) }}">   
                {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>