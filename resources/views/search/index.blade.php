@extends('app')

@section('content')
    <div class="articles">
        @foreach($articles as $article)
            @include('particles.article', [ 'article'=> $article, 'bio' => true])
        @endforeach
        <div class="widget text-center">
            {!! $articles->render() !!}
        </div>
    </div>
@endsection