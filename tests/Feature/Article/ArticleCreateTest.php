<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticleCreateTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Проверка на успешное открытие страницы создания статьи
     *
     * @return void
     */
    public function test_successful_page_view()
    {
        $response = $this->get(route('create-article'));
        $response->assertStatus(200);
        $response->assertSee('Новая статья');
    }

    /**
     * Проверка на успешное создание статьи
     *
     * @return void
     */
    public function test_successful_creation()
    {
        $articleData = Article::factory()->make()->toArray();
        $response = $this->post(route('store-article'), $articleData);

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Статья успешно создана');
        $this->assertDatabaseHas('articles', [
            'slug' => $articleData['slug'],
        ]);
    }

    /**
     * Проверка на неудачное создание статьи (валидация)
     *
     * @return void
     */
    public function test_invalid_creation()
    {
        $response = $this->post(route('store-article'));

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    /**
     * Проверка на неудачное создание статьи (валидация)
     *
     * @return void
     */
    public function test_duplicate_creation()
    {
        $article = Article::factory()->create()->toArray();
        $response = $this->post(route('store-article'), $article);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }
}
