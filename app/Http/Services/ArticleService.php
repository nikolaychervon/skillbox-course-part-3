<?php

namespace App\Http\Services;

use App\Http\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class ArticleService
{
    /**
     * Создать обращение
     *
     * @param ArticleDTO $articleDTO
     * @return Model|Article
     */
    public function create(ArticleDTO $articleDTO): Model|Article
    {
        return Article::query()->create([
            'slug'              => $articleDTO->slug,
            'name'              => $articleDTO->name,
            'short_description' => $articleDTO->short_description,
            'content'           => $articleDTO->content,
            'published'         => $articleDTO->published,
        ]);
    }
}
