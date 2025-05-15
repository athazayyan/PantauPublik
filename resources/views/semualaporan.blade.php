<x-layout>
    <x-slot:title>Semua Laporan</x-slot>

    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Semua Laporan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($laporans as $laporan)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                    {{-- Lampiran Gambar --}}
                    @php
                        $lampiranPaths = is_array($laporan->lampiran) ? $laporan->lampiran : json_decode($laporan->lampiran, true);
                    @endphp
                    @if (!empty($lampiranPaths))
                        @php
                            $firstFile = $lampiranPaths[0];
                            $ext = pathinfo($firstFile, PATHINFO_EXTENSION);
                        @endphp
                        
                        @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $firstFile) }}" alt="Lampiran" class="w-full h-48 object-cover">
                        @elseif (in_array($ext, ['pdf']))
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                <a href="{{ asset('storage/' . $firstFile) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <svg class="w-12 h-12 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"></path></svg>
                                    Lihat PDF
                                </a>
                            </div>
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                <a href="{{ asset('storage/' . $firstFile) }}" target="_blank" class="text-blue-600 hover:underline">
                                    Lihat Dokumen
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 italic">
                            Tidak ada lampiran
                        </div>
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-2"> {{ $laporan->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-1"><strong>Tanggal:</strong> {{ $laporan->tanggal->format('d M Y') }}</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Status:</strong> {{ $laporan->status }}</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Lokasi:</strong> {{ $laporan->lokasi }}</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Kategori:</strong> {{ $laporan->kategori }}</p>
                        <p> Dilaporkan oleh
                        <a href="{{ route('pelapor', $laporan->pelapor->id) }}" class="inline-block mt-3 text-blue-600 hover:underline text-sm">
                            {{ $laporan->pelapor->name }}
                        </a>
                        </p>
                        <a href="{{ route('laporan.show', $laporan->id) }}" class="inline-block mt-3 text-blue-600 hover:underline text-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
