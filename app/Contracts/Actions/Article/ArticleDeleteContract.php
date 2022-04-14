<?php

namespace App\Contracts\Actions\Article;

use App\Models\Article;

interface ArticleDeleteContract
{
    /**
     * Удалить статью
     *
     * @param Article $article
     * @return void
     */
    public function __invoke(Article $article): void;
}
