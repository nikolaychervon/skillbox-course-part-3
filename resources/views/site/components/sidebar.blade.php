<aside class="col-md-4 blog-sidebar">
    <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">Блог</h4>
        <p class="mb-0">Блоги предназначены для публикации пользователями своих материалов и организации
            дискуссий</p>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Теги</h4>
        @if(empty($tags))
            ( Нет тегов )
        @else
            <ol class="list-unstyled mb-0">
                @foreach($tags as $tag)
                    <li><a href="?tag={{ $tag->slug }}">{{ $tag->name }}</a></li>
                @endforeach
            </ol>
        @endif
    </div>

    <div class="p-3">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</aside>
