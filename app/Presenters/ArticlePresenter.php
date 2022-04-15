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
     * @var TagPresenter
     */
    private TagPresenter $tagPresenter;

    /**
     * @param ArticlesRepository $articles
     * @param TagPresenter $tagPresenter
     */
    public function __construct(ArticlesRepository $articles, TagPresenter $tagPresenter)
    {
        $this->articles = $articles;
        $this->tagPresenter = $tagPresenter;
    }

    /**
     * Получить необходимые данные для главной страницы
     *
     * @param string|null $tag
     * @return array
     */
    public function index(string $tag = null): array
    {
        $articles = $tag ? $this->articles->getByTag($tag) : $this->articles->getPublishedList();
        $articlesList = new PresenterItem($articles, ['name', 'short_description', 'slug', 'created_at', 'tags']);
        $popularArticle = new PresenterItem($articles->shift(), ['name', 'short_description', 'slug', 'tags']);
        $lastArticles = new PresenterItem($articles->shift(2), ['name', 'short_description', 'slug', 'created_at', 'tags']);


        return $this->tagPresenter->index() + [
                'articles' => $this->present($articlesList),
                'popular_article' => $this->present($popularArticle),
                'last_articles' => $this->present($lastArticles),
            ];
    }

    /**
     * Получить необходимые данные для детальной страницы статьи
     *
     * @param Article $article
     * @return array
     */
    public function show(Article $article): array
    {
        $article = new PresenterItem($article, ['name', 'created_at', 'content', 'slug']);
        return [
            'article' => $this->present($article)
        ];
    }

    /**
     * Получить необходимые данные для страницы изменения статьи
     *
     * @param Article $article
     * @return array
     */
    public function edit(Article $article): array
    {
        $article = new PresenterItem($article, [
            'name', 'created_at', 'content',
            'slug', 'published', 'short_description', 'tags_str'
        ]);

        return [
            'article' => $this->present($article)
        ];
    }
}
