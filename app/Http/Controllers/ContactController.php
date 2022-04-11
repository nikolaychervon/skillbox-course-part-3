<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Вернуть щаблон страницы создания обращения
     *
     * @return View
     */
    public function create(): View
    {
        return view('site.pages.contacts');
    }
}
