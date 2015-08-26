@extends('app')

@section('content')
    <div class="articles">
        @foreach($articles as $article)
            @include('particles.article', [ 'article'=> $article, 'bio' => true])
        @endforeach
        @if($articles->hasPages())
	        <div class="widget text-center">
	            {!! $articles->render() !!}
	        </div>
        @endif
    </div>
@endsection