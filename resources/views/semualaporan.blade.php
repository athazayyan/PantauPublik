<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <h1>Semua Laporan</h1>

    @foreach ($laporans as $laporan)
        <article class="max-w-2xl mx-4 my-4 overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="p-6 border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $laporan["judul"] }}</h3>
            <p class="text-gray-600 mb-4">{{ $laporan["deskripsi"] }}</p>
            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                <span>Lokasi: {{ $laporan["lokasi"] }}</span>
                </div>
                <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Status: {{ $laporan["status"] }}</span>
                </div>
                <div class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Tanggal: {{ $laporan["tanggal"] }}</span>
                <span>Pelapor: {{ $laporan["pelapor_id"] }}</span>
                </div>
            </div>
            </div>
        </article></svg></div>
    @endforeach</article>
    </x-layout>
