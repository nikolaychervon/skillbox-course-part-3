<?php

namespace App\Actions\Contact;

use App\Actions\AbstractAction;
use App\DTO\ContactDTO;
use App\Models\Article;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class ContactCreateAction extends AbstractAction
{
    /**
     * Создать обращение
     *
     * @param ContactDTO $contactDTO
     * @return Model|Article
     */
    public static function handle(ContactDTO $contactDTO): Model|Contact
    {
        return Contact::query()->create([
            'email' => $contactDTO->email,
            'message' => $contactDTO->message
        ]);
    }
}
