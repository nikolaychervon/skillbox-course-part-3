<?php

namespace App\Actions\Article;

use App\Contracts\Actions\Article\ArticleUpdateContract;
use App\DTO\ArticleDTO;
use App\Models\Article;

class ArticleUpdateAction implements ArticleUpdateContract
{
    /**
     * Обновить статью
     *
     * @param Article $article
     * @param ArticleDTO $articleDTO
     * @return Article
     */
    public function __invoke(Article $article, ArticleDTO $articleDTO): Article
    {
        $article->update($articleDTO->toArray());
        return $article;
    }
}
