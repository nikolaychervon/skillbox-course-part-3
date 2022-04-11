@extends('site.master')

@section('title', 'Новая статья')

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <br>
            <h1>Новая статья</h1>
            <hr>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="slug">Символьный код</label>
                    <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slugHelp"
                           placeholder="Укажите символьный код">
                    <small id="slugHelp" class="form-text text-muted">
                        Должен состоять только из латинских символов, цифр и символов тире и подчеркивания.
                    </small>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Название статьи</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                           placeholder="Укажите название статьи">
                    <small id="nameHelp" class="form-text text-muted">
                        Не менее 5 и не более 100 символов.
                    </small>
                </div>
                <br>
                <div class="form-group">
                    <label for="short-description">Краткое описание</label>
                    <textarea class="form-control" id="short-description" aria-describedby="short-descriptionHelp"
                              name="short-description"
                              placeholder="Краткое описание"></textarea>
                    <small id="short-descriptionHelp" class="form-text text-muted">
                        Не более 255 символов.
                    </small>
                </div>
                <br>
                <div class="form-group">
                    <label for="content">Полное описание</label>
                    <textarea class="form-control" id="content" name="content"
                              placeholder="Полное описание"></textarea>
                </div>
                <br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="published" name="published">
                    <label class="form-check-label" for="published">Опубликовать</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Отправить обращение</button>
            </form>
        </div>
        @include('site.components.sidebar')
    </div>

@endsection
