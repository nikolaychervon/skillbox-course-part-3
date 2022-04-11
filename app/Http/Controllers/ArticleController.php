<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
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
}
