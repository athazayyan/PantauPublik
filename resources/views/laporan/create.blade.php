<x-layout>
    <x-slot:title>Buat Laporan</x-slot:title>

    <section class="mt-15">
        <div class="max-w-2xl mx-auto p-6 bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-700">
            <h1 class="text-3xl font-bold text-white mb-6 text-center">Formulir Laporan Baru</h1>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
                    <strong class="font-bold">Terjadi kesalahan:</strong>
                    <ul class="list-disc list-inside mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="judul" class="block font-semibold text-amber-50 mb-2">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="w-full bg-gray-700 text-amber-50 border border-gray-600 rounded-xl p-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200" required>
                </div>

                <div>
                    <label for="deskripsi" class="block font-semibold text-amber-50 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="w-full bg-gray-700 text-amber-50 border border-gray-600 rounded-xl p-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200" rows="4" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div>
                    <label for="lokasi" class="block font-semibold text-amber-50 mb-2">Lokasi</label>
                    <select name="lokasi" id="lokasi" class="w-full bg-gray-700 text-amber-50 border border-gray-600 rounded-xl p-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200" required>
                        <option value="Baiturrahman" @selected(old('lokasi') == 'Baiturrahman')>Baiturrahman</option>
                        <option value="Banda Raya" @selected(old('lokasi') == 'Banda Raya')>Banda Raya</option>
                        <option value="Jaya Baru" @selected(old('lokasi') == 'Jaya Baru')>Jaya Baru</option>
                        <option value="Kuta Alam" @selected(old('lokasi') == 'Kuta Alam')>Kuta Alam</option>
                        <option value="Kuta Raja" @selected(old('lokasi') == 'Kuta Raja')>Kuta Raja</option>
                        <option value="Lueng Bata" @selected(old('lokasi') == 'Lueng Bata')>Lueng Bata</option>
                        <option value="Meuraxa" @selected(old('lokasi') == 'Meuraxa')>Meuraxa</option>
                        <option value="Syiah Kuala" @selected(old('lokasi') == 'Syiah Kuala')>Syiah Kuala</option>
                        <option value="Ulee Kareng" @selected(old('lokasi') == 'Ulee Kareng')>Ulee Kareng</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block font-semibold text-amber-50 mb-2">Status</label>
                    <select name="status" id="status" class="w-full bg-gray-700 text-amber-50 border border-gray-600 rounded-xl p-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200" required>
                        <option value="Ringan" @selected(old('status', 'Ringan') == 'Ringan')>Ringan</option>
                        <option value="Sedang" @selected(old('status') == 'Sedang')>Sedang</option>
                        <option value="Berat" @selected(old('status') == 'Berat')>Berat</option>
                    </select>
                </div>

                <div>
                    <label for="kategori" class="block font-semibold text-amber-50 mb-2">Kategori</label>
                    <select name="kategori" id="kategori" class="w-full bg-gray-700 text-amber-50 border border-gray-600 rounded-xl p-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200" required>
                        <optgroup label="Jalan dan Jembatan">
                            <option value="Lubang atau retakan pada jalan raya">Lubang atau retakan pada jalan raya</option>
                            <option value="Jembatan rusak atau berkarat">Jembatan rusak atau berkarat</option>
                            <option value="Drainase tersumbat menyebabkan banjir">Drainase tersumbat menyebabkan banjir</option>
                        </optgroup>
                        <optgroup label="Bangunan Publik">
                            <option value="Dinding retak atau roboh">Dinding retak atau roboh</option>
                            <option value="Atap bocor atau rusak">Atap bocor atau rusak</option>
                            <option value="Sistem ventilasi atau AC tidak berfungsi">Sistem ventilasi atau AC tidak berfungsi</option>
                        </optgroup>
                        <optgroup label="Sarana Transportasi">
                            <option value="Trotoar rusak atau tidak rata">Trotoar rusak atau tidak rata</option>
                            <option value="Lampu lalu lintas tidak berfungsi">Lampu lalu lintas tidak berfungsi</option>
                            <option value="Rambu jalan hilang atau rusak">Rambu jalan hilang atau rusak</option>
                        </optgroup>
                        <optgroup label="Saluran Air dan Sanitasi">
                            <option value="Pipa air pecah atau bocor">Pipa air pecah atau bocor</option>
                            <option value="Saluran pembuangan mampet">Saluran pembuangan mampet</option>
                            <option value="Sumber air minum tercemar">Sumber air minum tercemar</option>
                        </optgroup>
                        <optgroup label="Listrik dan Telekomunikasi">
                            <option value="Kabel listrik putus atau menggantung">Kabel listrik putus atau menggantung</option>
                            <option value="Tiang listrik miring atau roboh">Tiang listrik miring atau roboh</option>
                            <option value="Jaringan internet tidak stabil">Jaringan internet tidak stabil</option>
                        </optgroup>
                        <optgroup label="Ruang Publik dan Taman">
                            <option value="Kursi dan fasilitas taman rusak">Kursi dan fasilitas taman rusak</option>
                            <option value="Sampah menumpuk dan tidak terkelola">Sampah menumpuk dan tidak terkelola</option>
                            <option value="Penerangan jalan mati atau kurang">Penerangan jalan mati atau kurang</option>
                            <option value="Parkir Liar">Parkir Liar</option>
                            <option value="Lainnya">Lainnya</option>
                        </optgroup>
                    </select>
                </div>

                <div>
                    <label for="tanggal" class="block font-semibold text-amber-50 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="w-full bg-gray-700 text-amber-50 border border-gray-600 rounded-xl p-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200" required>
                </div>

                <div>
                    <label for="lampiran" class="block font-semibold text-amber-50 mb-2">Upload Lampiran (Opsional, bisa > 1 file)</label>
                    <input
                        type="file"
                        name="lampiran[]"
                        id="lampiran"
                        class="block w-full text-sm text-amber-50 border border-gray-600 rounded-xl cursor-pointer bg-gray-700 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-amber-50 hover:file:bg-blue-700 p-2 transition duration-200"
                        multiple
                        accept="image/*"
                    >
                    <p class="mt-2 text-sm text-gray-400" id="file_input_help">Contoh: PNG, JPG (MAX. 5MB per file).</p>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-600 text-amber-50 px-6 py-3 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200 font-semibold">
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layout>