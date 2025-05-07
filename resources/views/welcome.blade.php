<x-layout>
<x-slot:title>{{ $title }}</x-slot>
<section>
    <div class="container mx-auto mt-6 flex justify-evenly">
        <div class="">
            <h1 class="text-2xl font-bold text-white mb-4">Jumlah Laporan</h1>
            <p class="text-4xl font-semibold text-gray-800 bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 p-4 text-center">{{ $laporans->count() }}</p>

    </div>
    <div class="">
        <h1 class="text-2xl font-bold text-white mb-4">Jumlah Pelapor</h1>
        <p class="text-4xl  text-gray-800 text-4xl font-semibold text-gray-800 bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 p-4 text-center">{{ $pelapor->count() }}</p>
        
    </div>
        <div class="text-center gap-y-3">
    <h1 class="text-2xl font-bold text-white mb-7">Sejak Juli  </h1>
    <h1 class="text-4xl font-bold text-2xl  text-white">2025</h1>
    </div>
</div>
</section>
</x-layout>
