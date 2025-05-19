{{-- resources/views/laporan/show.blade.php --}}
<x-layout>
    <x-slot:title>{{ $title ?? 'Detail Laporan' }}</x-slot>

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $laporan->judul }}</h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Dilaporkan pada: {{ $laporan->tanggal->isoFormat('dddd, D MMMM YYYY') }}
                        @if ($laporan->pelapor)
                            oleh <a href="{{ route('pelapor.profil', $laporan->pelapor) }}" class="text-blue-600 hover:underline">{{ $laporan->pelapor->name }}</a>
                        @endif
                    </p>
                </div>

                @if ($laporan->lampiran)
                    @php
                        $lampiranPaths = is_array($laporan->lampiran) ? $laporan->lampiran : json_decode($laporan->lampiran, true);
                    @endphp
                    @if (!empty($lampiranPaths) && is_array($lampiranPaths))
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-700 mb-3">Lampiran:</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach ($lampiranPaths as $filePath)
                                    @if(is_string($filePath)) {{-- Pastikan $filePath adalah string --}}
                                        @php
                                            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                                        @endphp
                                        <div class="border rounded-lg overflow-hidden">
                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                <a href="{{ asset('storage/' . $filePath) }}" data-fancybox="gallery" data-caption="{{ basename($filePath) }}">
                                                    <img src="{{ asset('storage/' . $filePath) }}" alt="Lampiran Gambar: {{ basename($filePath) }}" class="w-full h-48 object-cover hover:opacity-75 transition-opacity">
                                                </a>
                                            @elseif ($extension === 'pdf')
                                                <div class="p-4 bg-gray-50 h-full flex flex-col items-center justify-center text-center">
                                                    <svg class="w-16 h-16 text-red-500 mb-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"></path></svg>
                                                    <a href="{{ asset('storage/' . $filePath) }}" target="_blank" class="text-blue-600 hover:underline font-medium">
                                                        {{ basename($filePath) }}
                                                    </a>
                                                    <p class="text-xs text-gray-500 mt-1">Lihat PDF</p>
                                                </div>
                                            @else
                                                <div class="p-4 bg-gray-50 h-full flex flex-col items-center justify-center text-center">
                                                     <svg class="w-16 h-16 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                    <a href="{{ asset('storage/' . $filePath) }}" target="_blank" class="text-blue-600 hover:underline font-medium">
                                                        {{ basename($filePath) }}
                                                    </a>
                                                    <p class="text-xs text-gray-500 mt-1">Unduh Dokumen</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 italic mb-6">Tidak ada lampiran.</p>
                    @endif
                @else
                     <p class="text-gray-500 italic mb-6">Tidak ada lampiran.</p>
                @endif


                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-1">Deskripsi Laporan:</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $laporan->deskripsi }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
                    <div>
                        <strong class="text-gray-600 block mb-1">Kategori:</strong>
                        <p class="text-gray-800">{{ $laporan->kategori }}</p>
                    </div>
                    <div>
                        <strong class="text-gray-600 block mb-1">Lokasi:</strong>
                        <p class="text-gray-800">{{ $laporan->lokasi }}</p>
                    </div>
                    <div>
                        <strong class="text-gray-600 block mb-1">Status:</strong>
                        <span class="px-3 py-1 text-xs font-bold rounded-full capitalize
                            @if(strtolower($laporan->status) == 'selesai') bg-green-200 text-green-800
                            @elseif(strtolower($laporan->status) == 'diproses') bg-yellow-200 text-yellow-800
                            @elseif(strtolower($laporan->status) == 'menunggu') bg-blue-200 text-blue-800
                            @else bg-gray-200 text-gray-800 @endif">
                            {{ $laporan->status }}
                        </span>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('laporan.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                    {{-- Tambahkan tombol edit/hapus jika diperlukan dan ada hak akses --}}
                    {{-- @can('update', $laporan)
                        <a href="{{ route('laporan.edit', $laporan) }}" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Edit Laporan
                        </a>
                    @endcan --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Jika Anda menggunakan Fancybox untuk galeri gambar --}}
    {{-- @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox]", {
                // Your custom options
            });
        });
    </script>
    @endpush --}}
</x-layout>