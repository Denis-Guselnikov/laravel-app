<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // 10 Тегов
        $tags = \App\Models\Tag::factory(10)->create();
        // 20 Статей
        $articles = \App\Models\Article::factory(20)->create();
        //
        $tags_id = $tags->pluck('id');
        // https://laravel.com/docs/8.x/collections#method-pluck
        // Для каждой Статьи будет связь с 3 Тегами, 3 Комментария
        $articles->each(function ($article) use ($tags_id) {
            $article->tags()->attach($tags_id->random(3));
            \App\Models\Comment::factory(3)->create([
                'article_id' => $article->id
            ]);
            // 1 набор Статестических данных
            \App\Models\State::factory(1)->create([
                'article_id' => $article->id
            ]);
        });
    }
}
