<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-100 mb-8 pb-2 border-b border-gray-200">Semua Laporan</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($laporans as $laporan)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="relative">
                    <div class="absolute top-0 right-5">
                        @if($laporan["status"] == "resolved")
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                {{ $laporan["status"] }}
                            </span>
                        @elseif($laporan["status"] == "in_progress")
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                {{ $laporan["status"] }}
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                {{ $laporan["status"] }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-6">
                    <a href="{{ url('/laporan/' . $laporan['id']) }}" class="block hover:text-blue-600 transition-colors duration-200">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $laporan['judul'] }}</h3>
                    </a>

                    <p class="text-gray-600 mb-6 line-clamp-3 text-sm">{{ $laporan["deskripsi"] }}</p>

                    <!-- Separator -->
                    <div class="border-t border-gray-100 mb-4"></div>

                    <!-- Info Items -->
                    <div class="space-y-3 text-sm">
                        <!-- Location -->
                        <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="truncate">{{ $laporan["lokasi"] }}</span>
                        </div>

                        <!-- Date -->
                        <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $laporan["tanggal"] }}</span>
                        </div>

                        <!-- Reporter -->
                        <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-gray-800 font-medium">Pelapor:</span>
                            <a href="{{ route('pelapor', $laporan->pelapor->id) }}" class="ml-1 text-blue-600 hover:text-blue-800 hover:underline truncate">
                                {{ $laporan->pelapor->name }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="bg-gray-50 px-6 py-3">
                    <a href="{{ url('/laporan/' . $laporan['id']) }}"
                       class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
