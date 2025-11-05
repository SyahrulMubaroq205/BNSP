<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BookController as FrontBookController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use Illuminate\Support\Facades\Route;

// =======================
// FRONTEND (PUBLIC)
// =======================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books/{slug}', [FrontBookController::class, 'show'])->name('book.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// =======================
// AUTH (LOGIN/REGISTER)
// =======================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// =======================
// LOGOUT
// =======================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// DASHBOARD BY ROLE
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // =======================
    // ADMIN ROUTES
    // =======================
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Buku (CRUD)
        Route::resource('books', BookController::class)->names('books');

        // Kategori Buku (CRUD)
        Route::resource('categories', CategoryController::class)->names('categories');

        // Pesanan / Orders
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{order}/confirm-payment', [OrderController::class, 'confirmPayment'])
            ->name('orders.confirmPayment');

        // Users (list only)
        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
    });

    // =======================
    // USER ROUTES
    // =======================
    Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // CART
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/cart/remove/{book}', [CartController::class, 'remove'])->name('cart.remove');

        // CHECKOUT & ORDERS (gunakan UserOrderController)
        Route::get('/checkout', [UserOrderController::class, 'checkout'])->name('checkout');
        Route::post('/checkout', [UserOrderController::class, 'placeOrder'])->name('checkout.place');

        Route::get('/orders', [UserOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [UserOrderController::class, 'show'])->name('orders.show');
    });
});
