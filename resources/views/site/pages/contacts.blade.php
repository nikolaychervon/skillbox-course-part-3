@extends('site.master')

@section('title', 'Контакты')

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>Свяжитесь с нами</h1>
            <hr>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Укажите email">
                </div>
                <br>
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Сообщение"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Отправить обращение</button>
            </form>
        </div>
        @include('site.components.sidebar')
    </div>

@endsection
