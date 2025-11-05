<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // List semua order (admin)
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'Akses ditolak!');
        }

        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Detail order (admin)
    public function show(Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'Akses ditolak!');
        }

        $order->load('items.book', 'user');
        return view('admin.orders.show', compact('order'));
    }

    // Konfirmasi payment / selesaikan order
    public function confirmPayment(Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'Akses ditolak!');
        }

        if ($order->status === 'pending') {
            $order->update(['status' => 'completed']);
            return redirect()->route('admin.orders.index')->with('success', 'Payment diterima dan order diselesaikan.');
        }

        return redirect()->back()->with('error', 'Order tidak bisa diubah.');
    }
}
