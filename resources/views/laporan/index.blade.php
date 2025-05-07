<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mt-4 text-amber-50">
        <h2>Detail Laporan</h2>

        <div class="card mt-3 bg-gray-800 text-white">
            <div class="card-body">
                <h5 class="card-title">Laporan #{{ $laporan->id ?? 'Laporan Tidak Ditemukan' }}</h5>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <p><strong>Judul:</strong> {{ $laporan->judul }}</p>
                        <p><strong>Tanggal:</strong> {{ $laporan->tanggal }}</p>
                        <p><strong>Status:</strong> {{ $laporan->status }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Lokasi:</strong> {{ $laporan->lokasi }}</p>
                        <p><strong>Kategori:</strong> {{ $laporan->kategori }}</p>
                    </div>
                </div>

                <div class="mt-3">
                    <h6>Deskripsi:</h6>
                    <p>{{ $laporan->deskripsi }}</p>
                </div>

                <!-- Menampilkan semua lampiran -->
                <div class="mt-3">
                    <h6>Lampiran:</h6>
                    @php
                        $lampiranPaths = json_decode($laporan->lampiran, true);
                    @endphp

                    @if (!empty($lampiranPaths))
                        <ul class="list-disc list-inside space-y-2">
                            @foreach ($lampiranPaths as $path)
                                @php
                                    $url = asset('storage/' . $path);
                                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                                @endphp

                                <li>
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ $url }}" alt="Lampiran Gambar" class="rounded shadow-sm w-48">
                                    @elseif (in_array($ext, ['pdf']))
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 underline">Lihat PDF</a>
                                    @elseif (in_array($ext, ['doc', 'docx']))
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 underline">Download Dokumen</a>
                                    @else
                                        <a href="{{ $url }}" target="_blank" class="text-blue-400 underline">File Lampiran</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Tidak ada lampiran tersedia</p>
                    @endif
                </div>

                <a href="{{ route('laporan.index') }}" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</x-layout>
