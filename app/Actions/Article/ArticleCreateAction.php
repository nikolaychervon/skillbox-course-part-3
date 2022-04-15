<?php

namespace App\Actions\Article;

use App\Actions\Traits\HasTagsSynchronizerTrait;
use App\Contracts\Actions\Article\ArticleCreateContract;
use App\DTO\ArticleDTO;
use App\Models\Article;

class ArticleCreateAction implements ArticleCreateContract
{
    use HasTagsSynchronizerTrait;

    /**
     * Создать статью
     *
     * @param ArticleDTO $articleDTO
     * @return void
     */
    public function __invoke(ArticleDTO $articleDTO): void
    {
        /** @var Article $article */
        $article = Article::query()->create($articleDTO->forTable());

        ($this->tagsSynchronizeAction)(
            $this->collectTags($articleDTO->tags),
            $article
        );
    }
}
