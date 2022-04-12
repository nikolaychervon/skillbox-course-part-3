<?php

namespace App\Http\Repositories;

use App\Models\Contact;

class ContactsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected string $model = Contact::class;
}
