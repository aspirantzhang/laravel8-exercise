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
        $user = \App\Models\User::factory()->create();
        $user2 = \App\Models\User::factory()->create();

        $personal = \App\Models\Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $work = \App\Models\Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $family = \App\Models\Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        \App\Models\Post::factory()->create([
            'user_id' => $user->id,
            'category' => $personal->id,
        ]);

        \App\Models\Post::factory(2)->create([
            'user_id' => $user2->id,
            'category' => $personal->id,
        ]);

        \App\Models\Post::factory(2)->create([
            'user_id' => $user->id,
            'category' => $personal->id,
        ]);

        \App\Models\Post::factory(2)->create([
            'user_id' => $user->id,
            'category' => $work->id,
        ]);

        \App\Models\Post::factory(3)->create([
            'user_id' => $user2->id,
            'category' => $work->id,
        ]);
    }
}
