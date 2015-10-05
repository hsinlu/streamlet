@extends('app')

@section('content')
    @include('particles.articles', ['articles' => $articles])
@endsection
