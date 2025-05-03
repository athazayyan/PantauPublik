<x-layout>
    <x-slot:title>Buat Laporan</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Formulir Laporan Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laporan.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="judul" class="block font-semibold">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label for="deskripsi" class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="w-full border border-gray-300 rounded p-2" rows="4" required></textarea>
        </div>

        <div>
            <label for="lokasi" class="block font-semibold">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label for="status" class="block font-semibold">Status</label>
            <select name="status" id="status" class="w-full border border-gray-300 rounded p-2" required>
                <option value="Menunggu">Menunggu</option>
                <option value="Diproses">Diproses</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <div>
            <label for="kategori" class="block font-semibold">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label for="tanggal" class="block font-semibold">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kirim Laporan
        </button>
    </form>
</x-layout>
