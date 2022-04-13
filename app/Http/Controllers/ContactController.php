<?php

namespace App\Http\Controllers;

use App\Actions\Contact\ContactCreateAction;
use App\DTO\ContactDTO;
use App\Http\Requests\Contact\ContactCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

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

    /**
     * Создать обращение
     *
     * @param ContactCreateRequest $request
     * @return RedirectResponse
     * @throws UnknownProperties
     */
    public function store(ContactCreateRequest $request): RedirectResponse
    {
        $contactDTO = new ContactDTO($request->validated());
        ContactCreateAction::handle($contactDTO);

        session()->flash('message', __('crud.created.contact'));
        return back();
    }
}
