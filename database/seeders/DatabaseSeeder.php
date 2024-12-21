<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;
use Database\Factories\LibraryFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $libraryFactory = new LibraryFactory();

        // Generate 50 books
        for ($i = 0; $i < 50; $i++) {
            Book::create($libraryFactory->book());
        }

        // Generate 20 readers
        for ($i = 0; $i < 20; $i++) {
            Reader::create($libraryFactory->reader());
        }

        // Generate 100 borrow records
        for ($i = 0; $i < 100; $i++) {
            Borrow::create($libraryFactory->borrow());
        }
    }
}
