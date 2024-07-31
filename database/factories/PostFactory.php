<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'title' => $this->faker->title ,
          'slug' => $this->faker->slug ,
          'description' => $this->faker->text ,
          'body' => $this->faker->text ,
          'user_id' => User::inRandomOrder()->first()->id ,
    
        ];
    }
}
