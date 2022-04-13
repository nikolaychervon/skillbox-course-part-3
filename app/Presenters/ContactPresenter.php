<?php

namespace App\Presenters;

use App\Presenters\Base\AbstractPresenter;
use App\Presenters\Base\PresenterItem;
use App\Repositories\ContactsRepository;

class ContactPresenter extends AbstractPresenter
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
     * Получить необходимые данные для страницы "Index"
     *
     * @return array
     */
    public function index(): array
    {
        $contacts = new PresenterItem($this->contacts->getList(), ['email', 'message', 'created_at']);
        return [
            'contacts' => $this->present($contacts)
        ];
    }
}
