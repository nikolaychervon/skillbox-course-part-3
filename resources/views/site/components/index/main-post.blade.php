<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">{{ $popular_article->name }}</h1>
        <p class="lead my-3">{{ $popular_article->short_description }}</p>
        <p class="lead mb-0">
            <a href="{{ route('show-article', ['article' => $popular_article->slug]) }}"
               class="text-white font-weight-bold">Читать дальше...</a>
        </p>
    </div>
</div>
