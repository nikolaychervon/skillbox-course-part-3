<?php

namespace App\Http\Controllers;

use App\Contracts\Actions\Article\ArticleCreateContract;
use App\DTO\ArticleDTO;
use App\Http\Requests\Article\ArticleCreateRequest;
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

        session()->flash('message', __('crud.created.article'));
        return back();
    }
}
