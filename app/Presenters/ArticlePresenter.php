<?php

namespace App\Presenters;

use App\Models\Article;
use App\Presenters\Base\AbstractPresenter;
use App\Presenters\Base\PresenterItem;
use App\Repositories\ArticlesRepository;

class ArticlePresenter extends AbstractPresenter
{
    /**
     * @var ArticlesRepository
     */
    private ArticlesRepository $articles;

    /**
     * @param ArticlesRepository $articles
     */
    public function __construct(ArticlesRepository $articles)
    {
        $this->articles = $articles;
    }

    /**
     * Получить необходимые данные для страницы "Index"
     *
     * @return array
     */
    public function index(): array
    {
        $articles = $this->articles->getPublishedList();
        $articlesList = new PresenterItem($articles, ['name', 'short_description', 'slug', 'created_at']);
        $popularArticle = new PresenterItem($articles->shift(), ['name', 'short_description', 'slug']);
        $lastArticles = new PresenterItem($articles->shift(2), ['name', 'short_description', 'slug', 'created_at']);

        return [
            'articles' => $this->present($articlesList),
            'popular_article' => $this->present($popularArticle),
            'last_articles' => $this->present($lastArticles)
        ];
    }

    /**
     * Получить необходимые данные для страницы "Show"
     *
     * @param Article $article
     * @return array
     */
    public function show(Article $article): array
    {
        $article = new PresenterItem($article, ['name', 'created_at', 'content']);
        return [
            'article' => $this->present($article)
        ];
    }
}
