<x-layout>
<x-slot:title>{{ $title }}</x-slot>
<section class="mt-15">
    <div class="container mx-auto mt-6 flex justify-evenly">
        <div class="">
            <p class="text-4xl font-semibold text-gray-800 bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 p-4 text-center mb-4">{{ $laporans->count() }}</p>
            <h1 class="text-2xl font-bold text-white ">Jumlah Laporan</h1>

    </div>
    <div class="">
        <p class="text-4xl  text-gray-800 text-4xl font-semibold text-gray-800 bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 p-4 text-center mb-4">{{ $pelapor->count() }}</p>
        <h1 class="text-2xl font-bold text-white mb-4">Jumlah Pelapor</h1>
        
    </div>
        <div class="text-center gap-y-3">
    <h1 class="text-2xl font-bold text-white mb-7 mt-2">Sejak Juli  </h1>
    <h1 class="text-4xl font-bold text-2xl  text-white">2025</h1>
    </div>
</div>
</section>

<section class="flex items-center mx-10 lg:mx-20 mt-30 100vh justify-center">
    <img class="h-auto w-[50%] block rounded-lg" src="{{ asset('storage/images/5_1.jpg') }}" alt="">
    <div class="bg-green-200 p-5 py-4 rounded-lg max-w-sm lg:rounded-none lg:py-6 lg:rounded-r-lg shadow-lg ">
        <h1 class="font-bold text-2xl mb-5 lg:mb-15">Pantau Publik</h1>
        <p>Pantau Publik adalah sebuah website yang dibuat untuk bersama-sama membenahi permasalahan-permasalahan yang ada. Saat ini masih dikhususkan untuk wilayah Banda Aceh</p>
    </div>
</section>

<section class="mt-20 mx-10 lg:mx-20">
    <div>
        <h1 class="font-bold text-4xl text-white mb-10">Laporan Terbaru</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($sekilas as $nilai)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
            @php
                $lampiranPaths = is_array($nilai->lampiran) ? $nilai->lampiran : json_decode($nilai->lampiran, true);
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
                        <h3 class="text-lg font-bold text-gray-800 mb-2"> {{ $nilai->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-1"><strong>Tanggal:</strong> {{ $nilai->tanggal->format('d M Y') }}</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Status:</strong> {{ $nilai->status }}</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Lokasi:</strong> {{ $nilai->lokasi }}</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Kategori:</strong> {{ $nilai->kategori }}</p>
                        <p> Dilaporkan oleh
                        <a href="{{ route('pelapor', $nilai->pelapor->id) }}" class="inline-block mt-3 text-blue-600 hover:underline text-sm">
                            {{ $nilai->pelapor->name }}
                        </a>
                        </p>
                        <a href="{{ route('laporan.show', $nilai->id) }}" class="inline-block mt-3 text-blue-600 hover:underline text-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            
            @endforeach

        </div>

    </div>
</section>

</x-layout>


