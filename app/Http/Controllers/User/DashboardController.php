<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh menampilkan view frontend dashboard user
        return view('user.dashboard');
    }
}
