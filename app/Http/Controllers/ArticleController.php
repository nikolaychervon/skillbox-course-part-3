<?php

namespace App\Http\Controllers;

use App\Http\DTO\ArticleDTO;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Services\ArticleService;
use App\Models\Article;
use App\Repositories\ArticlesRepository;
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
        $articles = $this->articles->getPublishedList();

        return view('site.pages.index', [
            'articles' => $articles,
            'popular_article' => $articles->shift(),
            'last_articles' => $articles->shift(2),
        ]);
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
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        return view('site.pages.articles.show', ['article' => $article]);
    }

    /**
     * Создать новую статью
     *
     * @param ArticleCreateRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleCreateRequest $request): RedirectResponse
    {
        $articleDTO = new ArticleDTO($request->all());
        $this->articleService->create($articleDTO);

        session()->flash('message', __('crud.created.article'));
        return back();
    }
}
