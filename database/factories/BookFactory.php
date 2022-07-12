<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'author_id'=>rand(1,10),
            'description' => $this->faker->paragraph,
            'cover' => $this->faker->imageUrl(storage_path('app/public/images'),640,480, null, false),
            'likes' => rand(1,1500),
            'updated_at' => now()
        ];
    }
}
