<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    // Checkout page (lihat keranjang)
    public function checkout()
    {
        $cart = Session::get('cart', []);
        return view('user.orders.checkout', compact('cart'));
    }

    // Place order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,transfer,credit_card',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        // Hitung total
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);

        // Buat order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
        ]);

        // Simpan order items
        foreach ($cart as $bookId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $bookId,
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('user.orders.index')->with('success', 'Order berhasil dibuat.');
    }

    // List semua order user
    public function index()
    {
        $orders = Auth::user()->orders()->with('items.book')->latest()->get();
        return view('user.orders.index', compact('orders'));
    }

    // Detail order
    public function show($id)
    {
        $order = Order::with('items.book')->findOrFail($id);
        if ($order->user_id !== Auth::id()) abort(403);
        return view('user.orders.show', compact('order'));
    }
}
