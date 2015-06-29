<?php

use Illuminate\Database\Seeder;

class FakerDataSeeder extends Seeder
{
    public function run()
    {
        // refresh migration        
        Artisan::call('migrate:refresh');

        // init data
        // create user
        $user = factory(App\User::class)->create();
        // create categories
        $categories = factory(App\Category::class, 5)->create(['user_id' => $user->id]);
        // create tags
        $tags = factory(App\Tag::class, 10)->create(['user_id' => $user->id]);
        // create articles
        factory(App\Article::class, 20)
            ->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ])
            ->each(function ($article) use ($tags) {
                $tagids = [];
                $tags->random(rand(2, 10))->each(function ($tag) use (&$tagids) {
                    array_push($tagids, $tag->id);
                });
                $article->tags()->attach($tagids);
            });
        // create knots
        factory(App\Knot::class, 10)
            ->create(['user_id' => $user->id])
            ->each(function ($knot) use ($tags) {
                $tagids = [];
                $tags->random(rand(2, 10))->each(function ($tag) use (&$tagids) {
                    array_push($tagids, $tag->id);
                });
                $knot->tags()->attach($tagids);
            });
    }
}
