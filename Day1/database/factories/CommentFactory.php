<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;


use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $commentable = $this->commentable();
        return [
            'body' => $this->faker->paragraph,
            'commentable_id' => $commentable::factory(),
            'commentable_type' => $commentable,
            'user_id' => function() {
                return User::all()->random();
            },
        ];
    }
    public function commentable()
    {
        return $this->faker->randomElement([
            Post::class,
        ]);
    }
}
