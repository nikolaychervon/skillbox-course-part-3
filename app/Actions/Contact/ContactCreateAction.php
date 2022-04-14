<?php

namespace App\Actions\Contact;

use App\Contracts\Actions\Contact\ContactCreateContract;
use App\DTO\ContactDTO;
use App\Models\Contact;

class ContactCreateAction implements ContactCreateContract
{
    /**
     * @param ContactDTO $contactDTO
     * @return void
     */
    public function __invoke(ContactDTO $contactDTO): void
    {
        Contact::query()->create([
            'email' => $contactDTO->email,
            'message' => $contactDTO->message
        ]);
    }
}
