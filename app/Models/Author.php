<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'laravel_through_key'
    ];

    public function book()
    {
        return $this->hasManyThrough(
            '\App\Models\Book',         // related
            '\App\Models\BookAuthor',   // through
            'author_id',                // first key
            'id',                       // second key
            'id',                       // local key
            'book_id'                   // second local key
        );
    }
}
