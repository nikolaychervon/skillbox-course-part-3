<?php

namespace App\Http\Repositories;

use App\Models\Article;

class ArticlesRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Article::class;
}
