<?php

namespace App\Actions\Article;

use App\Contracts\Actions\Article\ArticleCreateContract;
use App\DTO\ArticleDTO;
use App\Models\Article;

class ArticleCreateAction implements ArticleCreateContract
{
    /**
     * Создать статью
     *
     * @param ArticleDTO $articleDTO
     * @return void
     */
    public function __invoke(ArticleDTO $articleDTO): void
    {
        Article::query()->create([
            'slug' => $articleDTO->slug,
            'name' => $articleDTO->name,
            'short_description' => $articleDTO->short_description,
            'content' => $articleDTO->content,
            'published' => $articleDTO->published,
        ]);
    }
}
