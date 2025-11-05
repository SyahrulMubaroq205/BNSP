<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BookStore')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="font-sans antialiased" x-data="cartSidebar()">

    <header class="bg-red-600/80 backdrop-blur-md shadow-md p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-bold text-xl text-white">BookStore</a>
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-white hover:underline">Home</a>
                <a href="{{ route('about') }}" class="text-white hover:underline">About</a>
                <a href="{{ route('contact') }}" class="text-white hover:underline">Contact</a>
                <a href="{{ route('user.orders.index') }}" class="text-white hover:underline">History</a>
                @auth
                    <a href="{{ route('user.checkout') }}" class="text-white hover:underline">Checkout</a>
                    <span class="text-white">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-white hover:text-gray-200 ml-2 px-2 py-1 border border-white rounded">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white hover:bg-white/20 px-2 py-1 rounded transition">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-white hover:bg-white/20 px-2 py-1 rounded transition">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-4">
        @yield('content')
    </main>

</body>

</html>
