@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Detail Pesanan #{{ $order->id }}</h1>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl shadow-lg">
            <p class="text-gray-800 mb-2"><strong>Nama:</strong> {{ $order->user->name }}</p>
            <p class="text-gray-800 mb-2"><strong>Email:</strong> {{ $order->user->email }}</p>
            <p class="text-gray-800 mb-2"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p class="text-gray-800 mb-2"><strong>Metode Pembayaran:</strong>
                {{ $order->payment_method ? ucfirst(str_replace('_', ' ', $order->payment_method)) : 'Belum Dipilih' }}</p>
            <p class="text-gray-800 mb-2"><strong>Total:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

            <h2 class="text-xl font-semibold mt-4 mb-2 text-gray-800">Item Pesanan</h2>
            <ul class="space-y-2">
                @foreach ($order->items as $item)
                    <li class="flex justify-between text-gray-800">
                        <span>{{ $item->book->title }} x {{ $item->qty }}</span>
                        <span>Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
