@extends('app')

@section('content')
    @include('particles.article', ['article' => $article, 'bio' => false])
@endsection