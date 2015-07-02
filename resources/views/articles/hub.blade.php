@extends('admin')

@section('content')
<div class="hub">
    <div class="hub-list">
        <div class="list-group">
            @foreach($articles as $item)
                <a href="{{ url('articles/hub/' . $item->slug) . '?page=' . $articles->currentPage() }}" class="list-group-item {{ $item->slug == $article->slug ? 'active' : '' }}">
                    {{ $item->title }}
                    <p class="list-group-item-text">
                        {{ $item->published_at }}
                    </p>
                </a>
            @endforeach
            {!! $articles->render() !!}
        </div>
    </div>
    <div class="hub-content">
        <div class="action-bar">
            <a class="btn btn-default" href="{{ url('articles/edit/' . $article->slug) }}">
                <i class="fa fa-pencil"></i>&nbsp;{{ trans('strings.edit') }}
            </a>
            <a class="btn btn-danger" href="{{ url('articles/delete/' . $article->slug) }}">
                <i class="fa fa-trash-o"></i>&nbsp;{{ trans('strings.delete') }}
            </a>
        </div>
        <div class="panel-body">
            <h2>{{ $article->title }}</h2>
            {!! $article->body !!}
        </div>
    </div>
</div>
@endsection