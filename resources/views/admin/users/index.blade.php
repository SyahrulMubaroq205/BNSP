@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-700">Users List</h3>
    </div>

    <div class="overflow-x-auto bg-white/80 backdrop-blur-md rounded-lg shadow-md border border-gray-200">
        <table class="w-full min-w-max">
            <thead class="bg-red-600 text-white rounded-t-lg">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Registered At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
