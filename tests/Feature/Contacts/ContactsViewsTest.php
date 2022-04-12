<?php

namespace Tests\Feature\Contacts;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsViewsTest extends TestCase
{
    /**
     * Проверка на успешное открытие страницы просмотра списка обращений
     *
     * @return void
     */
    public function test_successful_list_view()
    {
        $response = $this->get(route('admin-panel-feedback'));
        $response->assertStatus(200);
        $response->assertSee('Список обращений');
    }
}
