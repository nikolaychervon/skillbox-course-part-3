<?php

namespace App\Contracts\Actions\Article;

use App\Models\Article;
use Illuminate\Support\Collection;

interface TagsSynchronizeContract
{
    /**
     * Синхронизировать теги и статью
     *
     * @param Collection $tags
     * @param Article $article
     * @return void
     */
    public function __invoke(Collection $tags, Article &$article): void;
}
