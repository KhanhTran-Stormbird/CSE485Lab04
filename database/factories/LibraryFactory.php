<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;

class LibraryFactory
{
    public function book(): array
    {
        return [
            'name' => fake()->sentence(3),
            'author' => fake()->name,
            'category' => fake()->word,
            'year' => fake()->year,
            'quantity' => fake()->numberBetween(1, 20),
        ];
    }

    public function reader(): array
    {
        return [
            'name' => fake()->name,
            'birthday' => fake()->date('Y-m-d', '2005-01-01'),
            'address' => fake()->address,
            'phone' => fake()->unique()->phoneNumber,
        ];
    }

    public function borrow(): array
    {
        return [
            'reader_id' => Reader::inRandomOrder()->first()->id,
            'book_id' => Book::inRandomOrder()->first()->id,
            'borrow_date' => fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'return_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'status' => fake()->boolean(50),
        ];
    }
}
