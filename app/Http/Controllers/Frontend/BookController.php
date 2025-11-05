<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        return view('frontend.books.show', compact('book'));
    }
}
