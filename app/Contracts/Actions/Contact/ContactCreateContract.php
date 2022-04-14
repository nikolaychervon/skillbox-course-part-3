<?php

namespace App\Contracts\Actions\Contact;

use App\DTO\ContactDTO;

interface ContactCreateContract
{
    /**
     * Создать обращение
     *
     * @param ContactDTO $contactDTO
     * @return void
     */
    public function __invoke(ContactDTO $contactDTO): void;
}
