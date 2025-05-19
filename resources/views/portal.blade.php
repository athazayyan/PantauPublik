<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class=" min-h-screen">
     

        <!-- Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Reports Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-600 truncate">
                                        Total Laporan
                                    </dt>
                                    <dd>
                                        <div class="text-2xl font-bold text-gray-900">
                                            {{ $totalLaporan }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ringan Reports Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gray-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-600 truncate">
                                        Ringan
                                    </dt>
                                    <dd>
                                        <div class="text-2xl font-bold text-gray-900">
                                            {{ $ringanLaporan }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sedang Reports Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-600 truncate">
                                        Sedang
                                    </dt>
                                    <dd>
                                        <div class="text-2xl font-bold text-gray-900">
                                            {{ $sedangLaporan }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Berat Reports Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-600 truncate">
                                        Berat
                                    </dt>
                                    <dd>
                                        <div class="text-2xl font-bold text-gray-900">
                                            {{ $beratLaporan }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Reports by Category Chart -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-xl leading-6 font-bold text-gray-900">
                            Laporan Berdasarkan Kategori
                        </h3>
                    </div>
                    <div class="p-6 h-80">
                        <canvas id="categoryChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Reports by Region Chart -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-xl leading-6 font-bold text-gray-900">
                            Laporan Berdasarkan Wilayah
                        </h3>
                    </div>
                    <div class="p-6 h-80">
                        <canvas id="regionChart" class="w-full h-full"></canvas>
                    </div>
                </div>
            </div>

            <!-- Monthly Reports Trend Chart -->
            <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-xl leading-6 font-bold text-gray-900">
                        Tren Laporan Bulanan
                    </h3>
                </div>
                <div class="p-6 h-80">
                    <canvas id="monthlyTrendChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Filter and Table Section -->
            <div class="mt-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="px-4 py-5 sm:px-6 flex flex-col md:flex-row md:items-center md:justify-between">
                        <h3 class="text-xl leading-6 font-bold text-gray-900">
                            Laporan Terbaru
                        </h3>

                        <!-- Filters -->
                        <form method="GET" action="{{ route('portal.index') }}" class="mt-4 md:mt-0 flex flex-col sm:flex-row gap-3">
                            <select name="filter_kategori" class="form-select block w-full rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm bg-white text-gray-900">
                                <option value="">Semua Kategori</option>
                                @foreach (array_keys($categoryData) as $kategori)
                                    <option value="{{ $kategori }}" @selected(request('filter_kategori') == $kategori)>{{ $kategori }}</option>
                                @endforeach
                            </select>

                            <select name="filter_lokasi" class="form-select block w-full rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm bg-white text-gray-900">
                                <option value="">Semua Wilayah</option>
                                @foreach (array_keys($regionData) as $lokasi)
                                    <option value="{{ $lokasi }}" @selected(request('filter_lokasi') == $lokasi)>{{ $lokasi }}</option>
                                @endforeach
                            </select>

                            <select name="filter_status" class="form-select block w-full rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm bg-white text-gray-900">
                                <option value="">Semua Status</option>
                                <option value="Ringan" @selected(request('filter_status') == 'Ringan')>Ringan</option>
                                <option value="Sedang" @selected(request('filter_status') == 'Sedang')>Sedang</option>
                                <option value="Berat" @selected(request('filter_status') == 'Berat')>Berat</option>
                            </select>

                            <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-semibold rounded-xl text-amber-50 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                                Filter
                            </button>
                        </form>
                    </div>

                    <!-- Table -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Judul
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Kategori
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Lokasi
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tanggal
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Detail</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($recentLaporan as $laporan)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">{{ $laporan->judul }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $laporan->kategori }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $laporan->lokasi }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($laporan->tanggal)->translatedFormat('d M Y') }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if($laporan->status == 'Berat')
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                {{ $laporan->status }}
                                                            </span>
                                                        @elseif($laporan->status == 'Sedang')
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                {{ $laporan->status }}
                                                            </span>
                                                        @else
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                {{ $laporan->status }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('laporan.show', $laporan->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                        Tidak ada laporan terbaru.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Menampilkan <span class="font-medium">{{ $recentLaporan->firstItem() }}</span> sampai <span class="font-medium">{{ $recentLaporan->lastItem() }}</span> dari <span class="font-medium">{{ $recentLaporan->total() }}</span> laporan
                                    </p>
                                </div>
                                <div>
                                    {{ $recentLaporan->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts for charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Category Chart
            var ctxCategory = document.getElementById('categoryChart').getContext('2d');
            var categoryChart = new Chart(ctxCategory, {
                type: 'doughnut',
                data: {
                    labels: @json(array_keys($categoryData)),
                    datasets: [{
                        label: 'Laporan berdasarkan Kategori',
                        data: @json(array_values($categoryData)),
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(153, 102, 255, 0.8)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                        }
                    }
                }
            });

            // Region Chart
            var ctxRegion = document.getElementById('regionChart').getContext('2d');
            var regionChart = new Chart(ctxRegion, {
                type: 'bar',
                data: {
                    labels: @json(array_keys($regionData)),
                    datasets: [{
                        label: 'Jumlah Laporan',
                        data: @json(array_values($regionData)),
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Monthly Trend Chart
            var ctxTrend = document.getElementById('monthlyTrendChart').getContext('2d');
            var trendChart = new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: @json(array_keys($monthlyTotals)),
                    datasets: [
                        {
                            label: 'Total Laporan',
                            data: @json(array_values($monthlyTotals)),
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-layout>