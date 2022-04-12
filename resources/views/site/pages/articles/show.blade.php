@extends('site.master')

@section('title', 'Заголовок статьи')

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>{{ $article->name }}</h1>
            <p class="blog-post-meta">{{ $article->created_at->format('l jS F Y') }} by <a href="#">Пользователь</a></p>
            <hr>
            <p>
                {{ $article->content }}
            </p>
            <br>
            <a href="{{ route('index') }}"><-- К списку</a>
        </div>
        @include('site.components.sidebar')
    </div>

@endsection
