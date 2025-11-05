@extends('layouts.admin')

@section('title', 'Books Management')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-700">Books List</h3>
        <a href="{{ route('admin.books.create') }}"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
            + Add New Book
        </a>
    </div>

    <div class="overflow-x-auto bg-white/80 backdrop-blur-md rounded-lg shadow-md border border-gray-200">
        <table class="w-full min-w-max">
            <thead class="bg-red-600 text-white rounded-t-lg">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Author</th>
                    <th class="px-4 py-2 text-left">Category</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $book->id }}</td>
                        <td class="px-4 py-2">{{ $book->title }}</td>
                        <td class="px-4 py-2">{{ $book->author }}</td>
                        <td class="px-4 py-2">{{ $book->category->name ?? '-' }}</td>
                        <td class="px-4 py-2">${{ number_format($book->price, 2) }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('admin.books.edit', $book->id) }}"
                                class="text-red-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
@endsection
