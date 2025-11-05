@extends('layouts.admin')

@section('title', 'Add New Book')

@section('content')
    <div class="bg-white/80 backdrop-blur-md p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Add New Book</h3>
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium text-gray-600">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600" required>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-600">Author</label>
                <input type="text" name="author" value="{{ old('author') }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600" required>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-600">Category</label>
                <select name="category_id"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600" required>
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-600">Price</label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600" required>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-600">Cover Image</label>
                <input type="file" name="cover_image" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-600">Description</label>
                <textarea name="description" rows="4"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                Save Book
            </button>
            <a href="{{ route('admin.books.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
@endsection
