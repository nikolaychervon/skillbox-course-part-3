<div class="blog-post">
    <div class="w-100">
        <strong class="d-inline-block" style="float: right; margin-left: 10px;">
            <form action="{{ route('delete-article', ['article' => $article->slug]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </strong>
        <strong class="d-inline-block" style="float: right;">
            <a class="btn btn-primary"
               href="{{ route('edit-article', ['article' => $article->slug]) }}">Редактировать</a>
        </strong>
    </div>
    <h2 class="blog-post-title">{{ $article->name }}</h2>
    <p class="blog-post-meta">{{ $article->created_at->format('l jS F Y') }} by <a href="#">Пользователь</a></p>

    <p>{{ $article->short_description }}</p>
    <a href="{{ route('show-article', ['article' => $article->slug]) }}">Читать дальше...</a>
    <hr>
</div>
