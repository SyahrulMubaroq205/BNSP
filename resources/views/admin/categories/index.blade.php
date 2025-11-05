@extends('layouts.admin')

@section('title', 'Categories Management')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-700">Categories List</h3>
        <a href="{{ route('admin.categories.create') }}"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
            + Add New Category
        </a>
    </div>

    <div class="overflow-x-auto bg-white/80 backdrop-blur-md rounded-lg shadow-md border border-gray-200">
        <table class="w-full min-w-max">
            <thead class="bg-red-600 text-white rounded-t-lg">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="text-red-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4 text-gray-500">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection
