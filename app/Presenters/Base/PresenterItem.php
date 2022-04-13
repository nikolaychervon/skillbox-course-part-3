<?php

namespace App\Presenters\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PresenterItem
{
    /**
     * @var Model|Collection
     */
    public Model|Collection $item;

    /**
     * @var array
     */
    public array $fields;

    /**
     * @param Model|Collection $item
     * @param array $fields
     */
    public function __construct(Model|Collection $item, array $fields = [])
    {
        $this->item = $item;
        $this->fields = $fields;
    }
}
