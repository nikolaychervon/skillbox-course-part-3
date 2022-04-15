<?php

namespace App\Actions\Article;

use App\Actions\Traits\HasTagsSynchronizerTrait;
use App\Contracts\Actions\Article\ArticleUpdateContract;
use App\DTO\ArticleDTO;
use App\Models\Article;

class ArticleUpdateAction implements ArticleUpdateContract
{
    use HasTagsSynchronizerTrait;

    /**
     * Обновить статью
     *
     * @param Article $article
     * @param ArticleDTO $articleDTO
     * @return Article
     */
    public function __invoke(Article $article, ArticleDTO $articleDTO): Article
    {
        $article->update($articleDTO->forTable());

        ($this->tagsSynchronizeAction)(
            $this->collectTags($articleDTO->tags),
            $article
        );

        return $article;
    }
}
