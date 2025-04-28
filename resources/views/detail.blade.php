<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mt-4 text-amber-50">
        <h2>Detail Laporan</h2>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Laporan #{{ isset($laporan['id']) ? $laporan['id'] : 'Laporan Tidak Ditemukan' }}</h5>


                <div class="row mt-3">
                    <div class="col-md-6">
                        <p><strong>Judul:</strong> {{ isset($laporan['judul']) ? $laporan['judul'] : '' }}</p>
                        <p><strong>Tanggal:</strong> {{ isset($laporan['tanggal']) ? $laporan['tanggal'] : '' }}</p>
                        <p><strong>Status:</strong> {{ isset($laporan['status']) ?  $laporan['status'] : '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Lokasi:</strong> {{ isset($laporan['lokasi']) ? $laporan['lokasi'] : '' }}</p>
                        <p><strong>Kategori:</strong> {{ isset($laporan['kategori']) ? $laporan['kategori'] : '' }}</p>
                    </div>
                </div>

                <div class="mt-3">
                    <h6>Deskripsi:</h6>
                    <p>{{ isset($laporan['deskripsi']) ? $laporan['deskripsi'] : '' }}</p>
                </div>

                <a href="/laporan" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
</x-layout>
