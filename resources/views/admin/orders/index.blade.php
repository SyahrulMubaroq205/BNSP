@extends('layouts.admin')

@section('title', 'Orders Management')

@section('content')
    <h3 class="text-xl font-semibold mb-6">Orders List</h3>

    <div class="overflow-x-auto bg-white/80 backdrop-blur-md rounded-lg shadow-md border border-gray-200">
        <table class="w-full min-w-max">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Order ID</th>
                    <th class="px-4 py-2 text-left">User</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->user->name }}</td>
                        <td class="px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                class="text-red-600 hover:underline">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
@endsection
