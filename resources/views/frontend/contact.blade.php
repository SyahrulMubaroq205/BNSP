@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Contact Us</h1>

        <p class="text-gray-700 mb-6">
            Have any questions? Feel free to reach out to us using the form below or via WhatsApp.
        </p>

        <form id="contactForm" class="space-y-6 max-w-lg">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="4" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                Send via WhatsApp
            </button>
        </form>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            // Ganti nomor WhatsApp sesuai nomor kamu, format internasional tanpa +
            const waNumber = '6285711019996';

            // Format pesan
            const text = `Hello! My name is ${name} (${email}) and I have a question: ${message}`;

            // Encode URL
            const url = `https://wa.me/${waNumber}?text=${encodeURIComponent(text)}`;

            // Buka WhatsApp
            window.open(url, '_blank');
        });
    </script>
@endsection
