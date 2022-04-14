@if($popular_article !== null)
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" style="display: flex;">
        <div class="col-6">
            <h1 class="display-4 font-italic">{{ $popular_article->name }}</h1>
            <p class="lead my-3">{{ $popular_article->short_description }}</p>
            <p class="lead mb-0">
                <a href="{{ route('show-article', ['article' => $popular_article->slug]) }}"
                   class="text-white font-weight-bold">Читать дальше...</a>
            </p>
        </div>
        <div class="col-6">
            <div class="w-100">
                <strong class="d-inline-block" style="float: right; margin-left: 10px;">
                    <form action="{{ route('delete-article', ['article' => $popular_article->slug]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-light">Удалить</button>
                    </form>
                </strong>
                <strong class="d-inline-block" style="float: right;">
                    <a class="btn btn-light"
                       href="{{ route('edit-article', ['article' => $popular_article->slug]) }}">Редактировать</a>
                </strong>
            </div>
        </div>
    </div>
@endif
