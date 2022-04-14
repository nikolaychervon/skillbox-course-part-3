<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ContactDTO extends DataTransferObject
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
}
