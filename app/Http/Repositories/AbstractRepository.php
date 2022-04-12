<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Traits\HasModelRepositoryTrait;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractRepository
{
    use HasModelRepositoryTrait;

    /**
     * Получить список данных с сортировкой по дате
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->query()->latest()->get();
    }
}
