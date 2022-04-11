<?php

namespace App\Http\DTO;

use Illuminate\Foundation\Http\FormRequest;

class ArticleDTO
{
    /**
     * @var string
     */
    public string $slug = '';

    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var string
     */
    public string $short_description = '';

    /**
     * @var string
     */
    public string $content = '';

    /**
     * @var bool
     */
    public bool $published;

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        $this->slug              = $request->get('slug');
        $this->name              = $request->get('name');
        $this->short_description = $request->get('short_description');
        $this->content           = $request->get('content');
        $this->published         = $request->get('published');
    }
}
