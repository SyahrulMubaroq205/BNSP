@extends('layouts.frontend')

@section('title', 'My Orders')

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">My Orders</h1>

        <div class="bg-white/20 backdrop-blur-md p-6 rounded-2xl shadow-lg overflow-x-auto">
            <table class="w-full min-w-max text-left">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-2">Order #</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Payment</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $order->id }}</td>
                            <td class="px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                            <td class="px-4 py-2 capitalize">{{ $order->payment_method ?? 'Not Selected' }}</td>
                            <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('user.orders.show', $order->id) }}" class="text-red-600 hover:underline">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
