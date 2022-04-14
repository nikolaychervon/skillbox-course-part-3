<?php

namespace App\Contracts\Actions\Article;

use App\DTO\ArticleDTO;

interface ArticleCreateContract
{
    /**
     * Создать статью
     *
     * @param ArticleDTO $articleDTO
     * @return void
     */
    public function __invoke(ArticleDTO $articleDTO): void;
}
