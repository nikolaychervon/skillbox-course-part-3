<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ArticleDTO extends DataTransferObject
{
    /**
     * Символьный номер статьи
     *
     * @var string
     */
    public string $slug = '';

    /**
     * Название статьи
     *
     * @var string
     */
    public string $name = '';

    /**
     * Коротное описание статьи
     *
     * @var string
     */
    public string $short_description = '';

    /**
     * Полное описание статьи
     *
     * @var string
     */
    public string $content = '';

    /**
     * Флаг, что статья опубликована
     *
     * @var bool
     */
    public bool $published;

    /**
     * Теги (через запятую)
     *
     * @var string
     */
    public string $tags;

    /**
     * @return array
     */
    public function forTable(): array
    {
        return $this->except('tags')->toArray();
    }
}
