@extends('site.master')

@section('title', $article->name)

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>Изменение статьи</h1>
            <hr>
            @include('site.components.articles.create-form', ['submit' => 'Сохранить'])
        </div>
        @include('site.components.sidebar')
    </div>

@endsection
