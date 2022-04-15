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
        <div class="col-6 position-relative">
            <div class="w-100">
                <strong class="d-inline-block" style="float: right; margin-left: 10px;">
                    <form action="{{ route('destroy-article', ['article' => $popular_article->slug]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash-fill"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                    </form>
                </strong>
                <strong class="d-inline-block" style="float: right;">
                    <a class="btn btn-light"
                       href="{{ route('edit-article', ['article' => $popular_article->slug]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </a>
                </strong>
            </div>
            <div style="position: absolute; bottom: 0; right: 0;">
                @forelse($popular_article->tags as $tag)
                    <span class="badge badge-warning" style="margin-left: 10px">
                        <a href="?tag={{ $tag->slug }}"
                           class="text-black font-weight-bold">{{ $tag->name }}</a>
                    </span>
                @empty
                    <p> (Тегов нет) </p>
                @endforelse
            </div>
        </div>
    </div>
@endif
