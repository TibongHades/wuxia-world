<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'chapters' => $this->faker->numberBetween(5, 20),
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'book_cover' => $this->faker->imageUrl(640, 480, 'books', true),
        ];
    }
}
