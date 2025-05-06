<x-layout>
    <x-slot:title>Buat Laporan</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Formulir Laporan Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Terjadi kesalahan:</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="judul" class="block font-semibold text-amber-50">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="deskripsi" class="block font-semibold text-amber-50">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label for="lokasi" class="block font-semibold text-amber-50">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="status" class="block font-semibold text-amber-50">Status</label>
            <select name="status" id="status" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                 {{-- Opsi Menunggu dipilih jika old('status') adalah 'Menunggu' atau jika old('status') kosong (nilai default) --}}
                <option value="Menunggu" class="text-black" @selected(old('status', 'Menunggu') == 'Menunggu')>Menunggu</option>
                <option value="Diproses" class="text-black" @selected(old('status') == 'Diproses')>Diproses</option>
                <option value="Selesai" class="text-black" @selected(old('status') == 'Selesai')>Selesai</option>
            </select>
        </div>

        <div>
            <label for="kategori" class="block font-semibold text-amber-50">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" class="bg-gray-700 w-full border border-gray-600 rounded p-2 text-amber-50 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="tanggal" class="block font-semibold text-amber-50">Tanggal</label>
            {{-- Tampilkan tanggal dalam format YYYY-MM-DD untuk input type="date" --}}
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="bg-gray-700 w-full border border-gray-600 rounded p-2 text-amber-50 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        {{-- === BAGIAN INPUT FILE YANG DIPERBAIKI === --}}
        <div>
            <label for="lampiran" class="block font-semibold text-amber-50">Upload Lampiran (Opsional, bisa > 1 file)</label>
            <input
                type="file"
                name="lampiran[]" {{-- Nama input, [] untuk multiple file --}}
                id="lampiran"
                class="block w-full text-sm text-gray-400 border border-gray-600 rounded cursor-pointer bg-gray-700 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600 p-1"
                multiple {{-- Atribut untuk mengizinkan multiple file --}}
                accept="image/*,application/pdf,.doc,.docx" {{-- Opsional: Batasi tipe file --}}
                >
             <p class="mt-1 text-sm text-gray-400" id="file_input_help">Contoh: PNG, JPG, PDF, DOCX (MAX. 5MB per file).</p> {{-- Opsional: Tambahkan hint --}}
        </div>
        {{-- === AKHIR BAGIAN INPUT FILE === --}}


        <button type="submit" class="bg-blue-600 text-amber-50 px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Kirim Laporan
        </button>

    </form>

    {{-- Perbaikan kecil: Ganti teks slot menjadi lebih spesifik --}}
    {{-- <x-slot:title>Formulir Laporan Baru</x-slot:title> --}}
</x-layout>