<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TagsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Tag::class;

    /**
     * Получить список тегов
     *
     * @return EloquentCollection
     */
    public function getList(): EloquentCollection
    {
        return $this->query()->get();
    }

    /**
     * Получить тег для синхронизации
     *
     * @param string $tag
     * @return Model|Tag
     */
    public function getTagForSync(string $tag): Model|Tag
    {
        return Tag::query()
            ->select('id')
            ->firstOrCreate(['name' => $tag], ['slug' => Str::slug($tag)]);
    }
}
