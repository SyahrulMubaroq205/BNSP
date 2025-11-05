<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Book $book, Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$book->id])) {
            $cart[$book->id]['qty'] += 1;
        } else {
            $cart[$book->id] = [
                'title' => $book->title,
                'price' => $book->price,
                'qty'   => 1,
            ];
        }

        Session::put('cart', $cart);

        // Redirect ke Checkout
        return redirect()->route('user.checkout')->with('success', $book->title . ' berhasil ditambahkan ke Checkout.');
    }
}
