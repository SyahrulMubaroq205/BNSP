@extends('layouts.frontend')

@section('title', $book->title . ' - BookStore')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4">
        <div class="flex flex-col md:flex-row gap-8 bg-white/30 backdrop-blur-md rounded-xl p-6 shadow-md">
            <!-- Cover Image -->
            <div class="md:w-1/3">
                @if ($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                        class="w-full h-auto rounded-lg object-cover">
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </div>

            <!-- Book Info -->
            <div class="md:w-2/3 flex flex-col justify-between">
                <h1 class="text-3xl font-bold text-gray-800">{{ $book->title }}</h1>
                <p class="text-gray-600 mt-2">by {{ $book->author }}</p>
                <p class="text-red-600 font-bold text-2xl mt-4">${{ number_format($book->price, 2) }}</p>
                <p class="mt-4 text-gray-700">{{ $book->description ?? 'No description available.' }}</p>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('home') }}"
                        class="inline-block px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">
                        Back to Home
                    </a>

                    <form action="{{ route('user.cart.add', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-block px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    