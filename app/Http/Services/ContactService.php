<?php

namespace App\Http\Services;

use App\Http\DTO\ContactDTO;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class ContactService
{
    /**
     * Создать обращение
     *
     * @param ContactDTO $contactDTO
     * @return Model|Contact
     */
    public function create(ContactDTO $contactDTO): Model|Contact
    {
        return Contact::query()->create([
            'email' => $contactDTO->email,
            'message' => $contactDTO->message
        ]);
    }
}
