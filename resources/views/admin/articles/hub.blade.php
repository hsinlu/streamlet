@extends('admin.app')

@section('content')
<div class="hub">
    <div class="hub-nav">
        <div class="search">
            <form action="{{ url('admin/articles/hub') }}" class="form-inline pull-left">
                <div class="input-group">
                    <input name="words" type="text" class="form-control" placeholder="{{ trans('strings.tips.input_search_words') }}" value="{{ $words }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default pull-right">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div> 
            </form>
            <div class="pull-right">
                <a href="{{ url('admin/articles/create') }}" class="btn-add"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="list-group">
            <div class="list">
                @foreach($articles as $item)
                    <a href="{{ route('articles_hub', ['slug' => $item->slug, 'page' => $articles->currentPage(), 'words' => $words]) }}" class="{{ $item->slug == $article->slug ? 'active' : '' }}">
                        {{ $item->title }}
                        <p class="help-block">
                            {{ $item->published_at }}
                        </p>
                    </a>
                @endforeach
            </div>
            {!! $articles->render() !!}
        </div>
    </div>
    <div class="hub-content">
        <div class="action-bar">
            <a class="btn btn-default" href="{{ url('admin/articles/edit/' . $article->slug) }}">
                <i class="fa fa-pencil"></i>&nbsp;{{ trans('strings.edit') }}
            </a>
            <a class="btn btn-danger" href="{{ url('admin/articles/delete/' . $article->slug) }}">
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