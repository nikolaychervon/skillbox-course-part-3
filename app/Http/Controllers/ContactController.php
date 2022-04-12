<?php

namespace App\Http\Controllers;

use App\Http\DTO\ContactDTO;
use App\Http\Requests\Contact\ContactCreateRequest;
use App\Http\Services\ContactService;
use App\Repositories\ContactsRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @var ContactsRepository
     */
    private ContactsRepository $contacts;

    /**
     * @var ContactService
     */
    private ContactService $contactService;

    /**
     * @param ContactsRepository $contacts
     * @param ContactService $contactService
     */
    public function __construct(ContactsRepository $contacts, ContactService $contactService)
    {
        $this->contacts = $contacts;
        $this->contactService = $contactService;
    }

    /**
     * Вернуть щаблон страницы создания обращения
     *
     * @return View
     */
    public function create(): View
    {
        return view('site.pages.contacts');
    }

    /**
     * Создать обращение
     *
     * @param ContactCreateRequest $request
     * @return RedirectResponse
     */
    public function store(ContactCreateRequest $request): RedirectResponse
    {
        $contactDTO = new ContactDTO($request->all());
        $this->contactService->create($contactDTO);

        session()->flash('message', __('crud.created.contact'));
        return back();
    }
}
