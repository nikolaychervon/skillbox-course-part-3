<?php

namespace App\Http\DTO;

use Illuminate\Foundation\Http\FormRequest;

class ContactDTO
{
    /**
     * @var string
     */
    public string $email = '';

    /**
     * @var string
     */
    public string $message = '';

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        $this->email = $request->get('email');
        $this->message = $request->get('message');
    }
}
