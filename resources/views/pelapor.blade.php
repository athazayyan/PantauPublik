<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="min-h-screen">
        <div class="container mx-auto p-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white mb-6">Laporan oleh {{ $user->name }}</h1>

            @if ($laporans->isEmpty())
                <p class="text-amber-50">Belum ada laporan yang dibuat oleh pengguna ini.</p>
            @else
                <ul class="space-y-6">
                    @foreach ($laporans as $laporan)
                        <li class="p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                            <h2 class="text-xl font-bold text-gray-900">{{ $laporan->judul }}</h2>
                            <p class="text-gray-700 mt-2">{{ Str::limit($laporan->isi, 100) }}</p>
                            <p class="text-sm text-gray-600 mt-2">Dibuat pada {{ $laporan->created_at->format('d M Y') }}</p>
                            <a href="{{ url('/laporan/' . $laporan->id) }}" class="inline-block mt-3 text-blue-600 hover:underline text-sm">
                                Lihat Selengkapnya
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layout>