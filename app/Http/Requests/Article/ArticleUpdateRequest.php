<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug'              => 'required|alpha_dash|unique:articles,slug,' . $this->article->id,
            'name'              => 'required|string|min:5|max:100',
            'short_description' => 'required|string|max:255',
            'content'           => 'required|string',
            'tags'              => 'string',
            'published'         => 'required|boolean'
        ];
    }
}
