@extends('layouts.frontend')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-8 text-gray-800 text-center">Checkout</h1>

        @if (count($cart) > 0)
            <div class="bg-white/20 backdrop-blur-md p-6 rounded-2xl shadow-lg">
                <div class="space-y-3">
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $item)
                        @php $total += $item['price'] * $item['qty']; @endphp
                        <div class="flex justify-between items-center border-b py-2">
                            <div>
                                <p class="font-semibold text-gray-700">{{ $item['title'] }}</p>
                                <p class="text-gray-500 text-sm">Qty: {{ $item['qty'] }}</p>
                            </div>
                            <div class="font-bold text-gray-800">
                                ${{ number_format($item['price'] * $item['qty'], 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between items-center mt-4 border-t pt-4 text-lg font-semibold">
                    <span>Total:</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>

                <form action="{{ route('user.checkout.place') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-gray-700">Payment Method</label>
                        <select name="payment_method" required
                            class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                            <option value="" disabled selected>-- Pilih Payment --</option>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                            <option value="credit_card">Credit Card</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg shadow-lg transition">
                        Pay Now
                    </button>
                </form>
            </div>
        @else
            <p class="text-center text-gray-500 mt-10">Keranjang kosong.</p>
        @endif
    </div>
@endsection
