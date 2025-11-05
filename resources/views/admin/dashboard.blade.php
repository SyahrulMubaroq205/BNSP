@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 bg-white/80 backdrop-blur-xl rounded-2xl shadow-md">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Total Books</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalBooks }}</p>
        </div>

        <div class="p-6 bg-white/80 backdrop-blur-xl rounded-2xl shadow-md">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Orders</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalOrders }}</p>
        </div>

        <div class="p-6 bg-white/80 backdrop-blur-xl rounded-2xl shadow-md">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Users</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</p>
        </div>
    </div>
@endsection
