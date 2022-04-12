<?php

namespace App\Http\DTO;

class ContactDTO
{
    /**
     * Почта отправителя обращения
     *
     * @var string
     */
    public string $email = '';

    /**
     * Сообщение обращения
     *
     * @var string
     */
    public string $message = '';

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->email   = $data['email'];
        $this->message = $data['message'];
    }
}
