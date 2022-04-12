<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use App\Repositories\ArticlesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleViewTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * Проверка на успешное открытие страницы просмотра списка постов
     *
     * @return void
     */
    public function test_successful_list_view()
    {
        $response = $this->get(route('index'));
        $response->assertStatus(200);
    }

    /**
     * Проверка на успешное открытие детальной страницы статьи
     *
     * @return void
     */
    public function test_successful_item_view()
    {
        $article = Article::factory()->create(['published' => true]);
        $response = $this->get(route('show-article', [
            'article' => $article->slug
        ]));

        $response->assertStatus(200);
        $response->assertSee($article->name);
    }

    /**
     * Проверка на открытие детальной страницы несуществующией статьи
     *
     * @return void
     */
    public function test_not_found_item_view()
    {
        $slug = $this->getUniqueSlug();
        $response = $this->get(route('show-article', [
            'article' => $slug
        ]));

        $response->assertStatus(404);
    }

    /**
     * Проверка на открытие детальной страницы неопубликованой статьи
     *
     * @return void
     */
    public function test_not_published_item_view()
    {
        $articleData = Article::factory()->create(['published' => false]);
        $response = $this->get(route('show-article', [
            'article' => $articleData['slug']
        ]));

        $response->assertStatus(404);
    }

    /**
     * Получить несуществующий символьный код
     *
     * @return string
     */
    private function getUniqueSlug(): string
    {
        $slug = $this->faker->slug;
        while (app(ArticlesRepository::class)->checkBySlug($slug)) {
            $slug = $this->faker->slug;
        }

        return $slug;
    }
}
