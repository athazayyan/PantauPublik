<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-amber-50 mb-8 text-center">Semua Laporan</h1>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-600 text-white border border-green-700 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 text-right">
            <a href="{{ route('laporan.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                Buat Laporan Baru
            </a>
        </div>

        @if($laporans->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($laporans as $laporan)
                    {{-- Hapus overflow-hidden dan flex flex-col sementara untuk debugging --}}
                    <article class="bg-gray-800 rounded-lg shadow-lg">
                        <div class="p-5"> {{-- Bungkus semua konten dalam satu padding --}}
                            {{-- Bagian untuk menampilkan gambar pertama sebagai thumbnail --}}
                            @if ($laporan->lampiran_paths && !empty($laporan->lampiran_paths[0]) && is_string($laporan->lampiran_paths[0]))
                                <a href="{{ route('laporan.show', $laporan->id) }}" class="block mb-4">
                                    <img src="{{ Storage::url($laporan->lampiran_paths[0]) }}"
                                         alt="Foto Laporan: {{ $laporan->judul }}"
                                         class="w-full h-48 object-cover rounded-md"> {{-- Tambahkan rounded-md pada gambar --}}
                                </a>
                            @else
                                {{-- Placeholder jika tidak ada gambar --}}
                                <a href="{{ route('laporan.show', $laporan->id) }}" class="block mb-4">
                                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-500 rounded-md">
                                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </a>
                            @endif

                            {{-- Judul dan Deskripsi --}}
                            <div>
                                <a href="{{ route('laporan.show', $laporan->id) }}">
                                    <h3 class="text-xl font-semibold text-amber-50 mb-2 hover:text-amber-400 transition-colors">{{ $laporan->judul }}</h3>
                                </a>
                                <p class="text-gray-400 text-sm mb-4">{{ $laporan->deskripsi }}</p> {{-- Hapus line-clamp sementara --}}
                            </div>

                            {{-- Detail Laporan --}}
                            <div class="space-y-2 text-xs text-gray-300 border-t border-gray-700 pt-3 mt-3">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    <span class="truncate">Lokasi: {{ $laporan->lokasi }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>Status:
                                        <span class="font-medium
                                            @if($laporan->status == 'Menunggu') text-yellow-400
                                            @elseif($laporan->status == 'Diproses') text-blue-400
                                            @else text-green-400 @endif">
                                            {{ $laporan->status }}
                                        </span>
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Tanggal: {{ $laporan->tanggal ? $laporan->tanggal->format('d M Y') : '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    <span class="truncate">Pelapor: {{ $laporan->pelapor ? $laporan->pelapor->name : 'N/A' }}</span>
                                </div>
                            </div>

                            {{-- Menampilkan beberapa thumbnail kecil jika ada lebih dari satu gambar --}}
                            @if ($laporan->lampiran_paths && count($laporan->lampiran_paths) > 1)
                                <div class="pt-3 mt-3 border-t border-gray-700">
                                    <p class="text-xs text-gray-500 mb-2">Lampiran lain:</p>
                                    <div class="flex space-x-2 overflow-x-auto">
                                        @foreach (array_slice($laporan->lampiran_paths, 1, 3) as $imgPath)
                                            <a href="{{ route('laporan.show', $laporan->id) }}">
                                                <img src="{{ Storage::url($imgPath) }}" alt="Lampiran kecil" class="w-16 h-16 object-cover rounded-md hover:opacity-80 transition-opacity">
                                            </a>
                                        @endforeach
                                        @if(count($laporan->lampiran_paths) > 4)
                                         <a href="{{ route('laporan.show', $laporan->id) }}" class="w-16 h-16 bg-gray-700 rounded-md flex items-center justify-center text-gray-400 text-xs hover:bg-gray-600">
                                            +{{ count($laporan->lampiran_paths) - 4 }} lagi
                                         </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($laporans->hasPages())
                <div class="mt-8">
                    {{ $laporans->links() }}
                </div>
            @endif
        @else
            <p class="text-amber-50 text-center">Belum ada laporan yang dibuat.</p>
        @endif
    </div>
</x-layout>