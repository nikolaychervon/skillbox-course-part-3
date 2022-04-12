<?php

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticlesRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Article::class;

    /**
     * Получить список опубликованый статей
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->query()->published()->latest()->get();
    }
}
