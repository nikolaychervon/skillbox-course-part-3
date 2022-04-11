<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * [Admin] Вернуть щаблон страницы "Список обращений"
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.pages.feedback.index');
    }
}
