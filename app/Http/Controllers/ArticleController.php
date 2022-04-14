<?php

namespace App\Http\Controllers;

use App\Contracts\Actions\Article\ArticleCreateContract;
use App\Contracts\Actions\Article\ArticleDeleteContract;
use App\Contracts\Actions\Article\ArticleUpdateContract;
use App\DTO\ArticleDTO;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Article;
use App\Presenters\ArticlePresenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleController extends Controller
{
    /**
     * @var ArticlePresenter
     */
    private ArticlePresenter $presenter;

    /**
     * @param ArticlePresenter $presenter
     */
    public function __construct(ArticlePresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    /**
     * Вернуть щаблон главной страницы (Список статей)
     *
     * @return View
     */
    public function index(): View
    {
        /** articles | popular_article | last_articles */
        $context = $this->presenter->index();
        return \view('site.pages.index', $context);
    }

    /**
     * Вернуть щаблон детальной страницы статьи
     *
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        /** article */
        $context = $this->presenter->show($article);
        return \view('site.pages.articles.show', $context);
    }

    /**
     * Вернуть щаблон страницы обновления статьи
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        /** article */
        $context = $this->presenter->edit($article);
        return \view('site.pages.articles.edit', $context);
    }

    /**
     * Вернуть щаблон страницы создания статьи
     *
     * @return View
     */
    public function create(): View
    {
        return \view('site.pages.articles.create');
    }

    /**
     * Создать новую статью
     *
     * @param ArticleCreateRequest $request
     * @param ArticleCreateContract $createAction
     * @return RedirectResponse
     * @throws UnknownProperties
     */
    public function store(ArticleCreateRequest $request, ArticleCreateContract $createAction): RedirectResponse
    {
        $articleDTO = new ArticleDTO($request->validated());
        $createAction($articleDTO);

        session()->flash('message', __('notifications.article.created'));
        return back();
    }

    /**
     * Обновить статью
     *
     * @param ArticleUpdateRequest $request
     * @param Article $article
     * @param ArticleUpdateContract $updateAction
     * @return RedirectResponse
     * @throws UnknownProperties
     */
    public function update(ArticleUpdateRequest $request, Article $article, ArticleUpdateContract $updateAction): RedirectResponse
    {
        $articleDTO = new ArticleDTO($request->validated());
        $article = $updateAction($article, $articleDTO);

        if (!$article->isPublished()) {
            session()->flash('message', __('notifications.article.updated_visibility'));
            return to_route('index');
        }

        session()->flash('message', __('notifications.article.updated'));
        return to_route('edit-article', ['article' => $article]);
    }

    /**
     * Удалить статью
     *
     * @param Article $article
     * @param ArticleDeleteContract $deleteAction
     * @return RedirectResponse
     */
    public function destroy(Article $article, ArticleDeleteContract $deleteAction): RedirectResponse
    {
        $deleteAction($article);

        session()->flash('message', __('notifications.article.deleted'));
        return to_route('index');
    }
}
