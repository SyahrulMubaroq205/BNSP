@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-red-800 to-red-500">
        <div class="bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl p-8 w-full max-w-xl text-white">
            <h1 class="text-3xl font-bold mb-6 text-center">Buat Akun Baru</h1>

            {{-- Error handling --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-500/50 p-3 rounded-lg text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Register form --}}
            <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-1 font-medium">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required
                        class="w-full p-3 rounded-full border border-red-400 bg-red-900/30 placeholder-red-200 text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200" />
                </div>

                <div>
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required
                        class="w-full p-3 rounded-full border border-red-400 bg-red-900/30 placeholder-red-200 text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200" />
                </div>

                <div>
                    <label class="block mb-1 font-medium">Password</label>
                    <input type="password" name="password" placeholder="********" required
                        class="w-full p-3 rounded-full border border-red-400 bg-red-900/30 placeholder-red-200 text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200" />
                </div>

                <div>
                    <label class="block mb-1 font-medium">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="********" required
                        class="w-full p-3 rounded-full border border-red-400 bg-red-900/30 placeholder-red-200 text-white focus:ring-2 focus:ring-red-400 focus:outline-none transition-all duration-200" />
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-3 rounded-full bg-red-600 hover:bg-red-700 text-white font-semibold transition-colors duration-200">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-sm text-white/80">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="underline hover:text-white font-medium">Masuk di sini</a>
            </p>
        </div>
    </div>
@endsection
