<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Вернуть щаблон страницы "О нас"
     *
     * @return View
     */
    public function index(): View
    {
        return \view('site.pages.about');
    }
}
