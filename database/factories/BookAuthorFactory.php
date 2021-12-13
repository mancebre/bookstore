<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookAuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $author = Author::inRandomOrder()->first();
        $book = Book::inRandomOrder()->first();
        return [
            'author_id' => $author->id,
            'book_id' => $book->id
        ];
    }
}
