<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class BooksTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
        $this->setUpFaker();
    }

    /**
     * test_can_create_book
     *
     * @return void
     */
    public function test_can_create_book()
    {
        $faker = \Faker\Factory::create();
        $data = [
            'name' => $faker->name,
            'description' => $faker->sentence,
            'publication_year' => (string) $this->faker->year
        ];

        // $this->withoutExceptionHandling();

        $this->post(route('books.store'), $data)
            ->assertStatus(201);
    }

    /**
     * test_can_show_book
     *
     * @return void
     */
    public function test_can_show_book()
    {
        $book = Book::factory()->make();
        $book->save();

        $this->get(route('books.show', $book->id))->assertStatus(200);
    }

    /**
     * test_can_update_book
     *
     * @return void
     */
    public function test_can_update_book()
    {
        $book = Book::factory()->make();
        $book->save();

        $faker = \Faker\Factory::create();
        $data = [
            'name' => $faker->name,
            'description' => $faker->sentence,
            'publication_year' => (string) $this->faker->year
        ];

        $this->put(route('books.update', $book->id), $data)
            ->assertStatus(200);
    }

    /**
     * test_can_delete_book
     *
     * @return void
     */
    public function test_can_delete_book()
    {
        $book = Book::factory()->make();
        $book->save();

        $this->delete(route('books.destroy', $book->id))
            ->assertStatus(204);
    }

    /**
     * test_can_list_books
     *
     * @return void
     */
    public function test_can_list_books()
    {
        $count = 10;
        Book::factory($count)->create();

        $this->get(route('books.index'))
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'type',
                            'attributes' => [
                                'name',
                                'author',
                                'description',
                                'publication_year'
                            ]
                        ]
                    ]
                ]
            );
    }
}
