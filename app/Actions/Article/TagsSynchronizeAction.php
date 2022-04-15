<?php

namespace App\Actions\Article;

use App\Contracts\Actions\Article\TagsSynchronizeContract;
use App\Models\Article;
use App\Repositories\TagsRepository;
use Illuminate\Support\Collection;

class TagsSynchronizeAction implements TagsSynchronizeContract
{
    /**
     * Синхронизировать теги и статью
     *
     * @param Collection $tags
     * @param Article $article
     * @return void
     */
    public function __invoke(Collection $tags, Article &$article): void
    {
        $tagsForSync = [];
        foreach ($tags as $tag) {
            $tagsForSync[] = app(TagsRepository::class)->getTagForSync($tag)->id;
        }

        $article->tags()->sync($tagsForSync);
    }
}
