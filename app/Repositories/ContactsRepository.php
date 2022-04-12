<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Contact::class;

    /**
     * Получить список обращений
     *
     * @return Collection
     */
    public function getList(): Collection
    {
        return $this->query()->latest()->get();
    }

    /**
     * Существует ли обращение от пользователя с переданым Email
     *
     * @param string $email
     * @return bool
     */
    public function checkByEmail(string $email): bool
    {
        return $this->query()->where('email', $email)->exists();
    }
}
