@extends('layouts.admin')

@section('title', 'Add New Category')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white/80 backdrop-blur-md p-6 rounded-lg shadow-md w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-700 text-center">Add New Category</h3>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-600">Description</label>
                    <textarea name="description" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                        Save Category
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
