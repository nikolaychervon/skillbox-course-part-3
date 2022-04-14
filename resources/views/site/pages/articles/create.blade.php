@extends('site.master')

@section('title', 'Новая статья')

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>Новая статья</h1>
            <hr>
            @include('site.components.articles.create-form', [
                'action' => route('store-article'),
                'method' => 'POST',
                'submit' => 'Создать статью'
            ])
        </div>
        @include('site.components.sidebar')
    </div>

@endsection
