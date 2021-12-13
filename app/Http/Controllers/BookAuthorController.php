<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookAuthorRequest;
use App\Http\Requests\UpdateBookAuthorRequest;
use App\Models\BookAuthor;
use App\Http\Resources\BookAuthorResource;
use Illuminate\Http\Response;

class BookAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $request
     * @return BookAuthorResource
     */
    public function store(StoreBookAuthorRequest $request): BookAuthorResource
    {
        $authorId = $request->input('author_id');
        $bookId = $request->input('book_id');

        if ($this->isBookAuthorExists($authorId, $bookId)) {
            return response(['message' => 'Already exists.'], 400);
        }

        $bookAuthor = BookAuthor::create([
            'author_id' => $authorId,
            'book_id' => $bookId,
        ]);

        return new BookAuthorResource($bookAuthor);
    }

    /**
     * isBookAuthorExists
     *
     * @param  int $authorId
     * @param  int $bookId
     * @return bool
     */
    protected function isBookAuthorExists($authorId, $bookId): bool
    {
        $bookAuthor = BookAuthor::where('author_id', $authorId)
            ->where('book_id', $bookId)
            ->count();

        return $bookAuthor > 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookAuthor  $bookAuthor
     * @return \Illuminate\Http\Response
     */
    public function show(BookAuthor $bookAuthor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookAuthor  $bookAuthor
     * @return \Illuminate\Http\Response
     */
    public function edit(BookAuthor $bookAuthor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookAuthorRequest  $request
     * @param  \App\Models\BookAuthor  $bookAuthor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookAuthorRequest $request, BookAuthor $bookAuthor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookAuthor  $bookAuthor
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAuthor $bookAuthor)
    {
        $bookAuthor->delete();
        return response(null, 204);
    }
}
