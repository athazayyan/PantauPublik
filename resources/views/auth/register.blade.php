<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register Page</title>
    <style>

    </style>
</head>
<body class="flex items-center justify-center h-screen bg-black">
    <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-2 mx-2 w-full max-w-4xl rounded-2xl overflow-hidden">
        <div id="kiri" class="bg-white p-8 rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none ">
            <h1 class="text-3xl font-bold mb-6 text-blue-800">DAFTAR</h1>

            @if (session('error'))
                <div class="mb-4 text-red-500">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <input type="text" name="name" placeholder="Nama"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <input type="number" name="handphone" placeholder="Handphone (Opsional)"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <input type="password" name="password" placeholder="Password"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-5">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="grid grid-cols-[2fr_1fr] gap-4 mb-5 ">
                    <button type="submit" class="bg-green-400 hover:bg-green-300 text-black font-bold px-4 py-2 rounded-md">
                        Daftar
                    </button>
                    <a href="/login" class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-center font-medium">
                        Masuk
                    </a>
                </div>


            </form>
        </div>

        <div id="kanan" class="bg-blue-800 p-8 rounded-b-2xl md:rounded-r-2xl md:rounded-bl-none flex flex-col justify-center">
            <div class="text-black font-bold text-xl mb-6">BARISAN PERBAIKAN</div>
            <div class="text-black font-medium">
                "The new source of power<br>
                is not money in<br>
                the hands of<br>
                a few, but<br>
                information in<br>
                the hands of<br>
                many."<br>
                <span class="block mt-2">John Naisbitt</span>
            </div>
        </div>
    </div>
</body>
</html>
