@extends('site.master')

@section('title', 'Контакты')

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>Свяжитесь с нами</h1>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('store-contact') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Укажите email"
                           value="{{ old('email') }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea class="form-control" id="message" name="message" aria-describedby="messageHelp"
                              placeholder="Сообщение">{{ old('message') }}</textarea>
                    <small id="messageHelp" class="form-text text-muted">
                        Не более 100 символов.
                    </small>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Отправить обращение</button>
            </form>
        </div>
        @include('site.components.sidebar')
    </div>

@endsection
