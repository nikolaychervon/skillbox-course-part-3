<?php

namespace App\Http\Controllers;

use App\Http\DTO\ArticleDTO;
use App\Http\Repositories\ArticlesRepository;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * @var ArticlesRepository
     */
    private ArticlesRepository $articles;

    /**
     * @var ArticleService
     */
    private ArticleService $articleService;

    /**
     * @param ArticlesRepository $articles
     * @param ArticleService $articleService
     */
    public function __construct(ArticlesRepository $articles, ArticleService $articleService)
    {
        $this->articles = $articles;
        $this->articleService = $articleService;
    }

    /**
     * Вернуть щаблон главной страницы (Список статей)
     *
     * @return View
     */
    public function index(): View
    {
        return view('site.pages.index');
    }

    /**
     * Вернуть щаблон страницы создания статьи
     *
     * @return View
     */
    public function create(): View
    {
        return view('site.pages.articles.create');
    }

    /**
     * Вернуть щаблон детальной страницы статьи
     *
     * @return View
     */
    public function show(): View
    {
        return view('site.pages.articles.show');
    }

    /**
     * Создать новую статью
     *
     * @param ArticleCreateRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleCreateRequest $request): RedirectResponse
    {
        $this->articleService->create(
            new ArticleDTO($request)
        );

        session()->flash('message', __('crud.created.article'));
        return back();
    }
}
