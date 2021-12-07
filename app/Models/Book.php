<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'publication_year'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'laravel_through_key'
    ];

    public function author()
    {
        return $this->hasManyThrough(
            '\App\Models\Author',       // related
            '\App\Models\BookAuthor',   // through
            'book_id',                  // first key
            'id',                       // second key
            'id',                       // local key
            'author_id'                 // second local key
        );
    }
}
