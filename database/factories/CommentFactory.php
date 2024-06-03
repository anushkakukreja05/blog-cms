<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user=User::all()->shuffle()->first();
        if(Comment::all()->first()){
            $parent_comment = Comment::all()->shuffle()->first();

            return [
                'user_id' =>$user->id,
                'name' => $user->name,
                'email' => $user->email,
                'comment_id' => $parent_comment->id,
                'post_id' => $parent_comment->post_id,
                'body' => fake()->sentence(mt_rand(10, 20))
            ];
        }
        return [
            'user_id' =>$user->id,
            'name' => $user->name,
            'email' => $user->email,
            'post_id' => Post::all()->shuffle()->first()->id,
            'comment_id' => null,
            'body' => fake()->sentence(mt_rand(10, 20))
        ];
    }
}
