<?php

namespace Tests\Feature\Contacts;

use App\Models\Contact;
use App\Repositories\ContactsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactCreateTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * Проверка на успешное создание обращения
     *
     * @return void
     */
    public function test_successful_creation()
    {
        $email = $this->getUniqueEmail();
        $contactData = Contact::factory()->make(['email' => $email])->toArray();
        $response = $this->post(route('contacts'), $contactData);

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Обращение успешно создано');
        $this->assertDatabaseHas('contacts', ['email' => $email]);
    }

    /**
     * Проверка на неудачное создание обращения
     *
     * @return void
     */
    public function test_invalid_creation()
    {
        $response = $this->post(route('contacts'));

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    /**
     * Получить несуществующий символьный код
     *
     * @return string
     */
    private function getUniqueEmail(): string
    {
        $email = $this->faker->email;
        while (app(ContactsRepository::class)->checkByEmail($email)) {
            $email = $this->faker->email;
        }

        return $email;
    }
}
