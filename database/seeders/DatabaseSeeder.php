<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Day 2-2
        \App\Models\Article::factory(20)->create();
        // Day 4-1
        \App\Models\Comment::factory(40)->create();

        $list = ['News', 'Tech', 'Web', 'Mobile', 'Lang'];

        foreach($list as $name) {
            \App\Models\Category::create(['name' => $name]);
        }
    }
}
