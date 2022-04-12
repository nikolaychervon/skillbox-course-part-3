<?php

namespace App\Http\DTO;

class ArticleDTO
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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->slug              = $data['slug'];
        $this->name              = $data['name'];
        $this->short_description = $data['short_description'];
        $this->content           = $data['content'];
        $this->published         = $data['published'];
    }
}
