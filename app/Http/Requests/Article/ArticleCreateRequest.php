<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'published' => (bool)$this->published,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug'              => 'required|alpha_dash|unique:articles',
            'name'              => 'required|string|min:5|max:100',
            'short_description' => 'required|string|max:255',
            'content'           => 'required|string',
            'published'         => 'required|boolean'
        ];
    }
}
