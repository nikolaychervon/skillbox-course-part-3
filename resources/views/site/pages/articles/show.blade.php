@extends('site.master')

@section('title', 'Заголовок статьи')

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>{{ $article->name }}</h1>
            <div class="w-100">
                <strong class="d-inline-block" style="float: right; margin-left: 10px;">
                    <form action="{{ route('delete-article', ['article' => $article->slug]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </strong>
                <strong class="d-inline-block" style="float: right;">
                    <a class="btn btn-primary" href="{{ route('edit-article', ['article' => $article->slug]) }}">Редактировать</a>
                </strong>
            </div>
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
