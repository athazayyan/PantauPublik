<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Laporan oleh {{ $user->name }}</h1>

        @if ($laporans->isEmpty())
            <p class="text-gray-600">Belum ada laporan yang dibuat oleh pengguna ini.</p>
        @else
            <ul class="space-y-4">
                @foreach ($laporans as $laporan)
                    <li class="p-4 bg-white shadow rounded-lg">
                        <h2 class="text-xl font-semibold">{{ $laporan->judul }}</h2>
                        <p class="text-gray-700 mt-1">{{ Str::limit($laporan->isi, 100) }}</p>
                        <p class="text-sm text-gray-500 mt-2">Dibuat pada {{ $laporan->created_at->format('d M Y') }}</p>
                       <a href="{{ url('/laporan/' . $laporan['id']) }}">
                            Lihat Selengkapnya
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>
