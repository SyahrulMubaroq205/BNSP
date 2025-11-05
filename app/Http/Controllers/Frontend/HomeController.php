<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        // Popular books: 4 terbaru
        $popularBooks = Book::when($search, fn($q) => $q->where('title', 'like', "%{$search}%")
            ->orWhere('author', 'like', "%{$search}%"))
            ->latest()
            ->take(4)
            ->get();

        // All books dengan pagination 12 per page
        $allBooks = Book::when($search, fn($q) => $q->where('title', 'like', "%{$search}%")
            ->orWhere('author', 'like', "%{$search}%"))
            ->latest()
            ->paginate(12);

        return view('frontend.home', compact('popularBooks', 'allBooks'));
    }
}
