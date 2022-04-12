<div class="blog-post">
    <h2 class="blog-post-title">{{ $article->name }}</h2>
    <p class="blog-post-meta">{{ $article->created_at->format('l jS F Y') }} by <a href="#">Пользователь</a></p>

    <p>{{ $article->short_description }}</p>
    <a href="{{ route('show-article', ['article' => $article->slug]) }}">Читать дальше...</a>
    <hr>
</div>
