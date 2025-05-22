<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mt-5 text-amber-50 max-w-4xl mx-auto">
        <div class="flex items-center mb-4">
            <h2 class="text-2xl font-bold">Detail Laporan</h2>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h5 class="text-xl font-semibold border-b border-gray-700 pb-3 mb-4">
                    Laporan #{{ $laporan->id ?? 'Laporan Tidak Ditemukan' }}
                </h5>

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <p class="mb-2"><span class="font-semibold text-gray-300">Judul:</span> {{ $laporan->judul }}</p>
                        <p class="mb-2"><span class="font-semibold text-gray-300">Tanggal:</span> {{ $laporan->tanggal }}</p>
                        <p class="mb-2"><span class="font-semibold text-gray-300">Status:</span> 
                            <span class="px-2 py-1 rounded text-xs font-medium
                            {{ $laporan->status == 'Selesai' ? 'bg-green-700' : 
                              ($laporan->status == 'Diproses' ? 'bg-blue-700' : 'bg-red-700') }}">
                                {{ $laporan->status }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <p class="mb-2"><span class="font-semibold text-gray-300">Lokasi:</span> {{ $laporan->lokasi }}</p>
                        <p class="mb-2"><span class="font-semibold text-gray-300">Kategori:</span> {{ $laporan->kategori }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h6 class="text-lg font-semibold text-gray-300 mb-2">Deskripsi:</h6>
                    <p class="bg-gray-700 p-4 rounded-lg">{{ $laporan->deskripsi }}</p>
                </div>

                <!-- Menampilkan semua lampiran -->
                <div class="mb-6">
                    <h6 class="text-lg font-semibold text-gray-300 mb-2">Lampiran:</h6>
                    @php
                        $lampiranPaths = json_decode($laporan->lampiran, true);
                    @endphp

                    @if (!empty($lampiranPaths))
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($lampiranPaths as $path)
                                @php
                                    $url = asset('storage/' . $path);
                                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                                @endphp

                                <div class="p-3 bg-gray-700 rounded-lg flex flex-col items-center">
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ $url }}" alt="Lampiran Gambar" class="rounded shadow-sm w-full h-32 object-cover mb-2">
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">Lihat Gambar</a>
                                    @elseif (in_array($ext, ['pdf']))
                                        <div class="bg-red-700 p-4 rounded-lg mb-2 w-16 h-16 flex items-center justify-center">
                                            <span class="text-white font-bold">PDF</span>
                                        </div>
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">Lihat PDF</a>
                                    @elseif (in_array($ext, ['doc', 'docx']))
                                        <div class="bg-blue-700 p-4 rounded-lg mb-2 w-16 h-16 flex items-center justify-center">
                                            <span class="text-white font-bold">DOC</span>
                                        </div>
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">Download Dokumen</a>
                                    @else
                                        <div class="bg-gray-600 p-4 rounded-lg mb-2 w-16 h-16 flex items-center justify-center">
                                            <span class="text-white font-bold">FILE</span>
                                        </div>
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">File Lampiran</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-400 italic">Tidak ada lampiran tersedia</p>
                    @endif
                </div>
                @if ($laporan->pelapor_id == auth()->user()->id)                
                <div class="flex mt-6 pt-4 border-t border-gray-700">
                        <a href="{{ route('laporan.edit', $laporan->id) }}" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-md mr-3 transition duration-200">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md mr-3 transition duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                     @endif
                    <a href="{{ url('/laporan') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md transition duration-200">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
