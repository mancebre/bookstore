<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class BookAuthorTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate');
        Artisan::call('db:seed');

        $this->user = User::first();
        $this->actingAs($this->user, 'api');
    }

    /**
     * test_can_add_book_author
     *
     * @return void
     */
    public function test_can_add_book_author()
    {
        $author = Author::first();
        $book = Book::first();

        $data = [
            'author_id' => $author->id,
            'book_id' => $book->id
        ];

        $this->post(route('book_author.store'), $data)
            ->assertStatus(201);
    }

    /**
     * can_delete_book_author
     *
     * @return void
     */
    public function test_can_delete_book_author()
    {
        $bookAuthor = BookAuthor::first();

        $this->delete(route('book_author.destroy', $bookAuthor),)
            ->assertStatus(204);
    }
}
