<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->realText(30),
            'description'=>$this->faker->realText(),
            'user_id' => function() {
                return User::all()->random();
            },
        ];
    }
}
