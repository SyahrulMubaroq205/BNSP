@extends('layouts.frontend')

@section('title', 'Home - BookStore')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- Search Form -->
        <div class="mb-6">
            <form action="{{ route('home') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search books..."
                    class="flex-1 p-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 rounded">
                    Search
                </button>
            </form>
        </div>

        <!-- Popular Books -->
        @if ($popularBooks->count())
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Popular Books</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                @foreach ($popularBooks as $book)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition flex flex-col">
                        <div
                            class="w-full aspect-[/3] bg-gray-200 flex items-center justify-center rounded-lg overflow-hidden">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-full h-full object-contain">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </div>


                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600">by {{ $book->author }}</p>
                            <p class="text-red-600 font-bold mt-2">${{ number_format($book->price, 2) }}</p>

                            <div class="mt-3 flex gap-2 flex-1 items-end">
                                <a href="{{ route('book.show', $book->slug) }}"
                                    class="flex-1 text-white bg-red-600 hover:bg-red-700 text-center py-2 rounded flex items-center justify-center">
                                    View Details
                                </a>

                                <form action="{{ route('user.cart.add', $book->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-blue-600 text-white py-2 rounded flex items-center justify-center">
                                        Checkout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- All Books -->
        <h2 class="text-2xl font-bold mb-4 text-gray-800">All Books</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($allBooks as $book)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition flex flex-col">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                            class="w-full h-56 object-cover">
                    @else
                        <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif

                    <div class="p-4 flex flex-col flex-1">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h2>
                        <p class="text-sm text-gray-600">by {{ $book->author }}</p>
                        <p class="text-red-600 font-bold mt-2">${{ number_format($book->price, 2) }}</p>

                        <div class="mt-3 flex gap-2 flex-1 items-end">
                            <a href="{{ route('book.show', $book->slug) }}"
                                class="flex-1 text-white bg-red-600 hover:bg-red-700 text-center py-2 rounded flex items-center justify-center">
                                View Details
                            </a>

                            <form action="{{ route('user.cart.add', $book->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit"
                                    class="w-full bg-blue-600 text-white py-2 rounded flex items-center justify-center">
                                    Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-4 text-center">No books found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $allBooks->withQueryString()->links() }}
        </div>
    </div>
@endsection
