<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * [Admin] Вернуть щаблон главной страницы
     *
     * @return View
     */
    public function index(): View
    {
        return \view('admin.pages.index');
    }
}
