@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-700 to-red-400 px-4">
        <div class="bg-white/10 backdrop-blur-lg p-10 rounded-3xl shadow-2xl max-w-3xl text-center w-full sm:w-3/4 lg:w-1/2">

            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 text-white drop-shadow-lg">
                Welcome, {{ auth()->user()->name }}!
            </h1>

            <p class="text-white/80 text-lg sm:text-xl mb-6 drop-shadow-sm">
                This is your dashboard. Browse books, view your orders, and manage your profile all in one place.
            </p>

            <a href="{{ route('home') }}"
                class="inline-block bg-white text-red-600 font-semibold px-6 py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105 hover:bg-white/90">
                Go to Home
            </a>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('user.cart.index') }}"
                    class="bg-white/20 backdrop-blur-md text-red-600 p-4 rounded-xl shadow-md hover:shadow-xl transition flex items-center justify-center font-semibold hover:scale-105">
                    My Cart
                </a>
                <a href="{{ route('user.orders.index') }}"
                    class="bg-white/20 backdrop-blur-md text-red-600 p-4 rounded-xl shadow-md hover:shadow-xl transition flex items-center justify-center font-semibold hover:scale-105">
                    My Orders
                </a>
            </div>

        </div>
    </div>
@endsection
