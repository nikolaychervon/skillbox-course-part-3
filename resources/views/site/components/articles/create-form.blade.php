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

<form action="{{ $action }}" method="POST">
    @method($method)
    @csrf
    <div class="form-group">
        <label for="slug">Символьный код</label>
        <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slugHelp"
               placeholder="Укажите символьный код" value="{{ old('slug', $article->slug ?? '') }}">
        <small id="slugHelp" class="form-text text-muted">
            Должен состоять только из латинских символов, цифр и символов тире и подчеркивания.
        </small>
    </div>
    <br>

    <div class="form-group">
        <label for="name">Название статьи</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
               placeholder="Укажите название статьи" value="{{ old('name', $article->name ?? '') }}">
        <small id="nameHelp" class="form-text text-muted">
            Не менее 5 и не более 100 символов.
        </small>
    </div>
    <br>

    <div class="form-group">
        <label for="short_description">Краткое описание</label>
        <textarea class="form-control" id="short_description" aria-describedby="short_descriptionHelp"
                  name="short_description"
                  placeholder="Краткое описание">{{ old('short_description', $article->short_description ?? '') }}</textarea>
        <small id="short_descriptionHelp" class="form-text text-muted">
            Не более 255 символов.
        </small>
    </div>
    <br>

    <div class="form-group">
        <label for="content">Полное описание</label>
        <textarea class="form-control" id="content" name="content"
                  placeholder="Полное описание">{{ old('content', $article->content ?? '') }}</textarea>
    </div>
    <br>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="published" name="published"
               @checked(old('published', $article->published ?? ''))>
        <label class="form-check-label" for="published">Опубликовать</label>
    </div>
    <br>

    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
</form>
