@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <div class="bg-white/80 backdrop-blur-md p-6 rounded-lg shadow-md max-w-md">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Edit Category</h3>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-1 focus:ring-red-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-1 focus:ring-red-500">{{ old('description', $category->description) }}</textarea>
            </div>

            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">Update</button>
            <a href="{{ route('admin.categories.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
@endsection
