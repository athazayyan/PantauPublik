<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> {{-- Tambahkan atribut lang untuk SEO dan aksesibilitas --}}
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name', 'PantauPublik') }}</title> {{-- Title yang lebih baik --}}

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Asumsi Anda menggunakan Vite --}}

    @livewireStyles {{-- WAJIB untuk Livewire --}}
</head>
<body class="bg-neutral-900 text-neutral-100 antialiased"> {{-- Tambahkan text-neutral-100 untuk default warna teks dan antialiased --}}
    <div class="flex flex-col min-h-screen"> {{-- Wrapper untuk sticky footer jika diperlukan --}}
        <x-navbar />

        <header> {{-- Lebih semantik menggunakan tag header jika x-header adalah heading utama halaman --}}
            <x-header>{{ $title ?? 'Selamat Datang' }}</x-header>
        </header>

        <main class="container mx-auto py-8 flex-grow"> {{-- py-8 untuk padding dan flex-grow untuk sticky footer --}}
            {{ $slot }}
        </main>

        <x-footer />
    </div>

    @livewireScripts {{-- WAJIB untuk Livewire --}}

    {{-- Alpine.js (Sangat direkomendasikan untuk interaksi dengan Livewire) --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Untuk script spesifik per halaman jika Anda membutuhkannya --}}
    @stack('scripts')
</body>
</html>