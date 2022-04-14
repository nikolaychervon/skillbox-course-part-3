<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Presenters\ContactPresenter;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * @var ContactPresenter
     */
    private ContactPresenter $presenter;

    /**
     * @param ContactPresenter $presenter
     */
    public function __construct(ContactPresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    /**
     * [Admin] Вернуть щаблон страницы "Список обращений"
     *
     * @return View
     */
    public function index(): View
    {
        /** contacts */
        $context = $this->presenter->index();
        return \view('admin.pages.feedback.index', $context);
    }
}
