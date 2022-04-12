<?php

namespace App\Repositories;

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
    public function getPublishedList(): Collection
    {
        return $this->query()->published()->latest()->get();
    }

    /**
     * Существует ли статья с переданым символьным кодом
     *
     * @param string $slug
     * @return bool
     */
    public function checkBySlug(string $slug): bool
    {
        return $this->query()->where('slug', $slug)->exists();
    }
}
