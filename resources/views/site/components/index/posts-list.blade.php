<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Список статей
    </h3>

    @if($articles->isEmpty())
    @else
        @foreach($articles as $article)
            @include('site.components.index.post-item')
        @endforeach
    @endif
</div>
