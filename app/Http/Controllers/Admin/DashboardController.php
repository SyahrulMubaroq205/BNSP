<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Batasi akses biar aman
        if ($user->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'Akses ditolak!');
        }

        // Ambil data dari database
        $totalBooks = Book::count();
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'user')->count(); // hanya user biasa

        return view('admin.dashboard', compact('user', 'totalBooks', 'totalOrders', 'totalUsers'));
    }
}
