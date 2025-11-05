@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-red-800 to-red-500">
        <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-xl w-full max-w-md text-white">
            <h2 class="text-3xl font-bold mb-6 text-center">Login to BookStore</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" placeholder="you@example.com" required
                        class="w-full p-3 rounded-full border border-red-400 bg-red-900/30 placeholder-red-200 text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Password</label>
                    <input type="password" name="password" placeholder="********" required
                        class="w-full p-3 rounded-full border border-red-400 bg-red-900/30 placeholder-red-200 text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200">
                </div>

                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 p-3 rounded-full font-semibold transition-colors duration-200">
                    Login
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-white/80">
                Belum punya akun? <a href="{{ route('register') }}" class="underline hover:text-white">Daftar di sini</a>
            </p>
        </div>
    </div>
@endsection
