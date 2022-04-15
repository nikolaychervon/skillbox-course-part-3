<?php

namespace App\Actions\Article;

use App\Contracts\Actions\Article\ArticleDeleteContract;
use App\Models\Article;

class ArticleDeleteAction implements ArticleDeleteContract
{
    /**
     * Удалить статью
     *
     * @param Article $article
     * @return void
     */
    public function __invoke(Article $article): void
    {
        $article->delete();
    }
}
