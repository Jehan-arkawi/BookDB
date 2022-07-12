<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genre_id'=>rand(1,10),
            'book_id'=>rand(1,100),
        ];
    }
}
