<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * @var ContactsRepository
     */
    private ContactsRepository $contacts;

    /**
     * @param ContactsRepository $contacts
     */
    public function __construct(ContactsRepository $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * [Admin] Вернуть щаблон страницы "Список обращений"
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.pages.feedback.index', [
            'contacts' => $this->contacts->getList()
        ]);
    }
}
