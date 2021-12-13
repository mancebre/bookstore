<?php

namespace Database\Seeders;

use App\Models\BookAuthor;
use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookAuthor::factory(25)->create();
    }
}
