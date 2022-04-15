<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    public const COUNT = 20;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        $articles = Article::factory()
            ->count(self::COUNT)
            ->create();

        foreach ($articles as $article) {
            $article->tags()->saveMany(
                $tags->random(rand(1, 5))
            );
        }
    }
}
