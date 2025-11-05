<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white/80 backdrop-blur-xl shadow-lg border-r border-gray-200 p-5">
            <h1 class="text-2xl font-bold mb-8 text-gray-800">Admin Panel</h1>
            <nav class="space-y-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="block py-2 px-4 rounded-lg hover:bg-gray-200">Dashboard</a>

                <a href="{{ route('admin.books.index') }}"
                    class="block py-2 px-4 rounded-lg hover:bg-gray-200">Books</a>
                <a href="{{ route('admin.categories.index') }}"
                    class="block py-2 px-4 rounded-lg hover:bg-gray-200">Categories</a>
                <a href="{{ route('admin.orders.index') }}"
                    class="block py-2 px-4 rounded-lg hover:bg-gray-200">Orders</a>
                <a href="{{ route('admin.users.index') }}"
                    class="block py-2 px-4 rounded-lg hover:bg-gray-200">Users</a>

                <form method="POST" action="{{ route('logout') }}" class="mt-6">
                    @csrf
                    <button class="w-full text-left py-2 px-4 rounded-lg bg-red-500 text-white hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>


        <!-- Main content -->
        <main class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-gray-200">
            <header class="mb-6 flex justify-between items-center">
                <h2 class="text-3xl font-semibold text-gray-700">@yield('title', 'Dashboard')</h2>
                <div class="text-sm text-gray-600">👋 {{ Auth::user()->name }}</div>
            </header>

            <section>
                @yield('content')
            </section>
        </main>
    </div>
</body>

</html>
