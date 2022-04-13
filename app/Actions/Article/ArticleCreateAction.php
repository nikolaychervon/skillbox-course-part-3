<?php

namespace App\Actions\Article;

use App\Actions\AbstractAction;
use App\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class ArticleCreateAction extends AbstractAction
{
    /**
     * Создать обращение
     *
     * @param ArticleDTO $articleDTO
     * @return Model|Article
     */
    public static function handle(ArticleDTO $articleDTO): Model|Article
    {
        return Article::query()->create([
            'slug' => $articleDTO->slug,
            'name' => $articleDTO->name,
            'short_description' => $articleDTO->short_description,
            'content' => $articleDTO->content,
            'published' => $articleDTO->published,
        ]);
    }
}
