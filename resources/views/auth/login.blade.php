<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-semibold mb-4">Login</h1>
        @if (session('error'))
            <div class="text-red-500 mb-3">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <a href="/register" class="mb-5"><p>
                Belum Punya Akun?</p></a>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-3">
                Login
            </button>
        </form>
    </div>
</x-layout>
