<x-layout>
    <x-slot:title>Edit Laporan</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Edit Laporan</h1>

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

    <form action="{{ route('laporan.edit', $laporan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block font-semibold text-amber-50">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $laporan->judul) }}" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="deskripsi" class="block font-semibold text-amber-50">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" rows="4" required>{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
        </div>

        <div>
            <label for="lokasi" class="block font-semibold text-amber-50">Lokasi</label>
            <select name="lokasi" id="lokasi" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                <option value="Baiturrahman" @selected(old('lokasi', $laporan->lokasi) == 'Baiturrahman')>Baiturrahman</option>
                <option value="Banda Raya" @selected(old('lokasi', $laporan->lokasi) == 'Banda Raya')>Banda Raya</option>
                <option value="Jaya Baru" @selected(old('lokasi', $laporan->lokasi) == 'Jaya Baru')>Jaya Baru</option>
                <option value="Kuta Alam" @selected(old('lokasi', $laporan->lokasi) == 'Kuta Alam')>Kuta Alam</option>
                <option value="Kuta Raja" @selected(old('lokasi', $laporan->lokasi) == 'Kuta Raja')>Kuta Raja</option>
                <option value="Lueng Bata" @selected(old('lokasi', $laporan->lokasi) == 'Lueng Bata')>Lueng Bata</option>
                <option value="Meuraxa" @selected(old('lokasi', $laporan->lokasi) == 'Meuraxa')>Meuraxa</option>
                <option value="Syiah Kuala" @selected(old('lokasi', $laporan->lokasi) == 'Syiah Kuala')>Syiah Kuala</option>
                <option value="Ulee Kareng" @selected(old('lokasi', $laporan->lokasi) == 'Ulee Kareng')>Ulee Kareng</option>
            </select>
        </div>

        <div>
            <label for="status" class="block font-semibold text-amber-50">Status</label>
            <select name="status" id="status" class="bg-gray-700 text-amber-50 w-full border border-gray-600 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                <option value="Ringan" class="text-black" @selected(old('status', $laporan->status) == 'Ringan')>Ringan</option>
                <option value="Sedang" class="text-black" @selected(old('status', $laporan->status) == 'Sedang')>Sedang</option>
                <option value="Berat" class="text-black" @selected(old('status', $laporan->status) == 'Berat')>Berat</option>
            </select>
        </div>

        <div>
            <label for="kategori" class="block font-semibold text-amber-50">Kategori</label>
            <select name="kategori" id="kategori" class="text-amber-50 w-full border border-gray-300 rounded p-2" required>
                <optgroup label="Jalan dan Jembatan" class="text-black">
                    <option value="Lubang atau retakan pada jalan raya" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Lubang atau retakan pada jalan raya')>Lubang atau retakan pada jalan raya</option>
                    <option value="Jembatan rusak atau berkarat" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Jembatan rusak atau berkarat')>Jembatan rusak atau berkarat</option>
                    <option value="Drainase tersumbat menyebabkan banjir" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Drainase tersumbat menyebabkan banjir')>Drainase tersumbat menyebabkan banjir</option>
                </optgroup>
                <optgroup label="Bangunan Publik" class="text-black">
                    <option value="Dinding retak atau roboh" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Dinding retak atau roboh')>Dinding retak atau roboh</option>
                    <option value="Atap bocor atau rusak" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Atap bocor atau rusak')>Atap bocor atau rusak</option>
                    <option value="Sistem ventilasi atau AC tidak berfungsi" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Sistem ventilasi atau AC tidak berfungsi')>Sistem ventilasi atau AC tidak berfungsi</option>
                </optgroup>
                <optgroup label="Sarana Transportasi" class="text-black">
                    <option value="Trotoar rusak atau tidak rata" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Trotoar rusak atau tidak rata')>Trotoar rusak atau tidak rata</option>
                    <option value="Lampu lalu lintas tidak berfungsi" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Lampu lalu lintas tidak berfungsi')>Lampu lalu lintas tidak berfungsi</option>
                    <option value="Rambu jalan hilang atau rusak" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Rambu jalan hilang atau rusak')>Rambu jalan hilang atau rusak</option>
                </optgroup>
                <optgroup label="Saluran Air dan Sanitasi" class="text-black">
                    <option value="Pipa air pecah atau bocor" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Pipa air pecah atau bocor')>Pipa air pecah atau bocor</option>
                    <option value="Saluran pembuangan mampet" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Saluran pembuangan mampet')>Saluran pembuangan mampet</option>
                    <option value="Sumber air minum tercemar" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Sumber air minum tercemar')>Sumber air minum tercemar</option>
                </optgroup>
                <optgroup label="Listrik dan Telekomunikasi" class="text-black">
                    <option value="Kabel listrik putus atau menggantung" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Kabel listrik putus atau menggantung')>Kabel listrik putus atau menggantung</option>
                    <option value="Tiang listrik miring atau roboh" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Tiang listrik miring atau roboh')>Tiang listrik miring atau roboh</option>
                    <option value="Jaringan internet tidak stabil" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Jaringan internet tidak stabil')>Jaringan internet tidak stabil</option>
                </optgroup>
                <optgroup label="Ruang Publik dan Taman" class="text-black">
                    <option value="Kursi dan fasilitas taman rusak" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Kursi dan fasilitas taman rusak')>Kursi dan fasilitas taman rusak</option>
                    <option value="Sampah menumpuk dan tidak terkelola" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Sampah menumpuk dan tidak terkelola')>Sampah menumpuk dan tidak terkelola</option>
                    <option value="Penerangan jalan mati atau kurang" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Penerangan jalan mati atau kurang')>Penerangan jalan mati atau kurang</option>
                    <option value="Parkir Liar" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Parkir Liar')>Parkir Liar</option>
                    <option value="Lainnya" class="text-black" @selected(old('kategori', $laporan->kategori) == 'Lainnya')>Lainnya</option>
                </optgroup>
            </select>
        </div>

        <div>
            <label for="tanggal" class="block font-semibold text-amber-50">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $laporan->tanggal ? date('Y-m-d', strtotime($laporan->tanggal)) : date('Y-m-d')) }}" class="bg-gray-700 w-full border border-gray-600 rounded p-2 text-amber-50 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        @if($laporan->lampiran && is_array($laporan->lampiran) && count($laporan->lampiran) > 0)
            <div class="mb-4">
                <label class="block font-semibold text-amber-50 mb-2">Lampiran Saat Ini:</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($laporan->lampiran as $index => $lampiran)
                        <div class="relative bg-gray-800 p-2 rounded border border-gray-600">
                            <div class="flex items-center">
                                <span class="text-amber-50">{{ basename($lampiran) }}</span>
                                <div class="ml-2">
                                    <input type="checkbox" name="hapus_lampiran[]" id="hapus_{{ $index }}" value="{{ $lampiran }}" class="mr-1">
                                    <label for="hapus_{{ $index }}" class="text-red-400 text-sm">Hapus</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div>
            <label for="lampiran" class="block font-semibold text-amber-50">Upload Lampiran Baru (Opsional)</label>
            <input
                type="file"
                name="lampiran[]"
                id="lampiran"
                class="block w-full text-sm text-gray-400 border border-gray-600 rounded cursor-pointer bg-gray-700 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600 p-1"
                multiple
                accept="image/*,application/pdf,.doc,.docx">
             <p class="mt-1 text-sm text-gray-400" id="file_input_help">Contoh: PNG, JPG (MAX. 5MB per file).</p>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-amber-50 px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Simpan Perubahan
            </button>
            <a href="{{ route('laporan.show', $laporan->id) }}" class="bg-gray-600 text-amber-50 px-4 py-2 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                Batal
            </a>
        </div>
    </form>
</x-layout>