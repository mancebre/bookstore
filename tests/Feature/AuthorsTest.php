<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class AuthorsTest extends TestCase
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
     * test_can_create_author
     *
     * @return void
     */
    public function test_can_create_author()
    {
        $data = [
            'name' => 'Test Author'
        ];

        // $this->withoutExceptionHandling();

        $this->post(route('authors.store'), $data)
            ->assertStatus(201);
    }

    /**
     * test_can_show_author
     *
     * @return void
     */
    public function test_can_show_author()
    {
        $author = Author::factory()->make();
        $author->save();

        $this->get(route('authors.show', $author->id))->assertStatus(200);
    }

    /**
     * test_can_update_author
     *
     * @return void
     */
    public function test_can_update_author()
    {
        $author = Author::factory()->make();
        $author->save();
        $data = [
            'name' => 'Test Again Author'
        ];

        $this->put(route('authors.update', $author->id), $data)
            ->assertStatus(200);
    }

    /**
     * test_can_delete_author
     *
     * @return void
     */
    public function test_can_delete_author()
    {
        $author = Author::factory()->make();
        $author->save();

        $this->delete(route('authors.destroy', $author->id))
            ->assertStatus(204);
    }

    /**
     * test_can_list_authors
     *
     * @return void
     */
    public function test_can_list_authors()
    {
        $count = 10;
        Author::factory($count)->create();

        $this->get(route('authors.index'))
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'type',
                            'attributes' => [
                                'name',
                                'book'
                            ]
                        ]
                    ]
                ]
            );
    }
}
