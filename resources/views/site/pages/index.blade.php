@extends('site.master')

@section('title', 'Главная страница')

@section('content')

    @if (session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <br>
    @include('site.components.index.main-post')
    @include('site.components.index.last-posts')

    <div class="row">
        @include('site.components.index.posts-list')
        @include('site.components.sidebar')
    </div>

@endsection
