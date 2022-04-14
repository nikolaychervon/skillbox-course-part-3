<?php

namespace App\Contracts\Actions\Article;

use App\DTO\ArticleDTO;
use App\Models\Article;

interface ArticleUpdateContract
{
    /**
     * Обновить статью
     *
     * @param Article $article
     * @param ArticleDTO $articleDTO
     * @return Article
     */
    public function __invoke(Article $article, ArticleDTO $articleDTO): Article;
}
