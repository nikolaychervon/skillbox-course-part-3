<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Tag::class;

    /**
     * Получить список тегов
     *
     * @return Collection
     */
    public function getList(): Collection
    {
        return $this->query()->get();
    }
}
