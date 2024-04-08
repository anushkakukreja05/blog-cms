<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(200)->create();
        Category::factory(10)->create();
        Tag::factory(25)->create();
        Post::factory(100)->create()
                            ->each(function($post) {
                                $post->tags()
                                ->attach(
                                    Tag::all()
                                        ->random(mt_rand(3,5))
                                        ->pluck('id')
                                        ->toArray()
                                );
                            });
    }
}
