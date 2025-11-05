@extends('layouts.admin')

@section('title', 'Order Detail')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Order #{{ $order->id }}</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    <div class="bg-white/20 backdrop-blur-md p-6 rounded-2xl shadow-lg">
        <p><strong>Nama:</strong> {{ $order->user->name }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Total:</strong> ${{ number_format($order->total_price, 2) }}</p>
        <p><strong>Payment:</strong> {{ $order->payment_method ?? 'Not Selected' }}</p>

        <h2 class="text-xl font-semibold mt-4 mb-2">Items</h2>
        <ul class="space-y-1">
            @foreach ($order->items as $item)
                <li class="flex justify-between">
                    <span>{{ $item->book->title }} x {{ $item->qty }}</span>
                    <span>${{ number_format($item->price * $item->qty, 2) }}</span>
                </li>
            @endforeach
        </ul>

        @if ($order->status === 'pending')
            <form action="{{ route('admin.orders.confirmPayment', $order->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Confirm Payment
                </button>
            </form>
        @endif
    </div>
@endsection
