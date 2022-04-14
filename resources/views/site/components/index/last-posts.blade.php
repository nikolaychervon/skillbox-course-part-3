<div class="row mb-2">
    @if(!empty($last_articles))
        @foreach($last_articles as $article)
            <div class="col-md-6" style="height: 300px">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="height: 100%">
                    <div class="card-body d-flex flex-column align-items-start">
                        <div class="w-100">
                            <strong class="d-inline-block mb-2" style="float: right; margin-left: 10px;">
                                <form action="{{ route('delete-article', ['article' => $article->slug]) }}"
                                      method="POST">
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
                        <h3 class="mb-0">
                            <a class="text-dark"
                               href="{{ route('show-article', ['article' => $article->slug]) }}">{{ $article->name }}
                            </a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $article->created_at->format('l jS F Y') }}</div>
                        <p class="card-text mb-auto">{{ $article->short_description }}</p>
                        <a href="{{ route('show-article', ['article' => $article->slug]) }}">Читать дальше...</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<br>
