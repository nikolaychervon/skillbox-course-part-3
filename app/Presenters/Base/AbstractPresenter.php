<?php

namespace App\Presenters\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use stdClass;

abstract class AbstractPresenter
{
    /**
     * Получить массив необходимых для представления данных
     *
     * @param PresenterItem $presenterItem
     * @return array|stdClass
     */
    protected function present(PresenterItem $presenterItem): array|stdClass
    {
        if ($presenterItem->item instanceof Model) {
            return $this->presentModel(
                $presenterItem->item,
                $presenterItem->fields,
            );
        }

        return $this->presentCollection(
            $presenterItem->item,
            $presenterItem->fields,
        );
    }

    /**
     * Получить массив необходимых для представления данных из модели
     *
     * @param Model $model
     * @param array $fields
     * @return stdClass
     */
    private function presentModel(Model $model, array $fields = []): stdClass
    {
        return (object)$model->only($fields);
    }

    /**
     * Получить массив необходимых для представления данных из колекции
     *
     * @param Collection $collection
     * @param array $fields
     * @return array
     */
    private function presentCollection(Collection $collection, array $fields = []): array
    {
        return $collection
            ->map(function ($model) use ($fields) {
                return $this->presentModel($model, $fields);
            })
            ->toArray();
    }
}
