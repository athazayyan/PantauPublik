{{-- resources/views/livewire/laporan-dashboard.blade.php --}}
<x-layout>
    <x-slot:title>{{ $title ?? 'Portal Laporan' }}</x-slot>

    <div class="bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                            Portal Laporan
                        </h1>
                        <p class="mt-1 text-sm text-gray-500">
                            Analisis dan visualisasi data laporan masyarakat
                        </p>
                    </div>
                    <div class="mt-4 flex md:mt-0 md:ml-4">
                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <a href="{{ route('laporan.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Buat Laporan Baru
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Reports Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Laporan</dt>
                                    <dd>
                                        <div wire:loading class="text-sm text-gray-500">Memuat...</div>
                                        <div wire:loading.remove class="text-lg font-bold text-gray-900">{{ $totalLaporan ?? 0 }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Reports Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Menunggu Proses</dt>
                                    <dd>
                                        <div wire:loading class="text-sm text-gray-500">Memuat...</div>
                                        <div wire:loading.remove class="text-lg font-bold text-gray-900">{{ $pendingLaporan ?? 0 }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- In Progress Reports Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Sedang Diproses</dt>
                                    <dd>
                                        <div wire:loading class="text-sm text-gray-500">Memuat...</div>
                                        <div wire:loading.remove class="text-lg font-bold text-gray-900">{{ $inProgressLaporan ?? 0 }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Completed Reports Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Selesai</dt>
                                    <dd>
                                        <div wire:loading class="text-sm text-gray-500">Memuat...</div>
                                        <div wire:loading.remove class="text-lg font-bold text-gray-900">{{ $completedLaporan ?? 0 }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section Wrapper for Alpine.js -->
            <div x-data="chartsManager(
                    {{ isset($categoryChartData) && !empty($categoryChartData['labels']) ? json_encode($categoryChartData) : '{}' }},
                    {{ isset($regionChartData) && !empty($regionChartData['labels']) ? json_encode($regionChartData) : '{}' }},
                    {{ isset($monthlyTrendData) && !empty($monthlyTrendData['labels']) ? json_encode($monthlyTrendData) : '{}' }}
                )"
                x-init="initCharts()"
                @charts-updated.window="updateAllCharts($event.detail)"
                wire:ignore
                >
                <div wire:loading.flex class="items-center justify-center h-80 text-gray-500">
                    <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    Memuat data chart...
                </div>

                <div wire:loading.remove>
                    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <div class="px-4 py-5 sm:px-6"><h3 class="text-lg leading-6 font-medium text-gray-900">Laporan Berdasarkan Kategori</h3></div>
                            <div class="p-6 h-80"><canvas id="categoryChart" class="w-full h-full"></canvas></div>
                        </div>
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <div class="px-4 py-5 sm:px-6"><h3 class="text-lg leading-6 font-medium text-gray-900">Laporan Berdasarkan Wilayah</h3></div>
                            <div class="p-6 h-80"><canvas id="regionChart" class="w-full h-full"></canvas></div>
                        </div>
                    </div>
                    <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-4 py-5 sm:px-6"><h3 class="text-lg leading-6 font-medium text-gray-900">Tren Laporan Bulanan</h3></div>
                        <div class="p-6 h-80"><canvas id="monthlyTrendChart" class="w-full h-full"></canvas></div>
                    </div>
                </div>
            </div>

            <!-- Filter and Table Section -->
            <div class="mt-8">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:px-6 flex flex-col md:flex-row md:items-center md:justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Laporan Terbaru</h3>
                        <div class="mt-4 md:mt-0 flex flex-col sm:flex-row gap-3">
                            <select wire:model.live="filterKategori" class="form-select block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Semua Kategori</option>
                                {{-- Idealnya, daftar kategori diambil dari database --}}
                                <option>Infrastruktur</option><option>Lingkungan</option><option>Keamanan</option><option>Layanan Publik</option><option>Lainnya</option>
                            </select>
                            <select wire:model.live="filterWilayah" class="form-select block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Semua Wilayah</option>
                                {{-- Idealnya, daftar wilayah diambil dari database --}}
                                <option>Jakarta Pusat</option><option>Jakarta Barat</option><option>Jakarta Timur</option><option>Jakarta Utara</option><option>Jakarta Selatan</option>
                            </select>
                            <select wire:model.live="filterStatus" class="form-select block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Semua Status</option>
                                <option>Menunggu</option><option>Diproses</option><option>Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div wire:loading.class="opacity-50" class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Detail</span></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($recentLaporan ?? [] as $laporan)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap"><div class="text-sm font-medium text-gray-900">{{ $laporan->judul }}</div></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><div class="text-sm text-gray-900">{{ $laporan->kategori }}</div></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><div class="text-sm text-gray-900">{{ $laporan->lokasi }}</div></td>
                                                    <td class="px-6 py-4 whitespace-nowrap"><div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($laporan->tanggal)->isoFormat('D MMM YYYY') }}</div></td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if($laporan->status == 'Selesai') <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $laporan->status }}</span>
                                                        @elseif($laporan->status == 'Diproses') <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $laporan->status }}</span>
                                                        @else <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">{{ $laporan->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"><a href="{{ route('laporan.show', $laporan->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a></td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">Tidak ada laporan yang ditemukan.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($recentLaporan) && $recentLaporan instanceof \Illuminate\Pagination\LengthAwarePaginator && $recentLaporan->hasPages())
                        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
                            {{ $recentLaporan->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script> --}}
    <script>
        // Jika menggunakan plugin datalabels, daftarkan:
        Chart.register(ChartDataLabels);

        function chartsManager(initialCategoryData, initialRegionData, initialMonthlyTrendData) {
            return {
                categoryChartInstance: null,
                regionChartInstance: null,
                monthlyTrendChartInstance: null,

                initCharts() {
                    const initSpecificChart = (canvasId, chartInstanceProp, type, chartDataFromLivewire, customOptions = {}) => {
                        const ctx = document.getElementById(canvasId);

                        // Hancurkan instance chart lama jika ada untuk mencegah duplikasi atau kebocoran memori
                        if (this[chartInstanceProp]) {
                            this[chartInstanceProp].destroy();
                            this[chartInstanceProp] = null; // Set ke null setelah destroy
                        }

                        // Validasi data dasar sebelum mencoba membuat chart
                        if (ctx && chartDataFromLivewire &&
                            typeof chartDataFromLivewire === 'object' && // Pastikan objek
                            Array.isArray(chartDataFromLivewire.labels) && chartDataFromLivewire.labels.length > 0 &&
                            Array.isArray(chartDataFromLivewire.datasets) && chartDataFromLivewire.datasets.length > 0 &&
                            Array.isArray(chartDataFromLivewire.datasets[0].data) && chartDataFromLivewire.datasets[0].data.length > 0
                        ) {
                            const defaultOptions = { responsive: true, maintainAspectRatio: false };
                            const finalOptions = { ...defaultOptions, ...customOptions };

                            this[chartInstanceProp] = new Chart(ctx.getContext('2d'), {
                                type,
                                data: {
                                    labels: chartDataFromLivewire.labels,
                                    datasets: chartDataFromLivewire.datasets
                                },
                                options: finalOptions,
                                plugins: customOptions.plugins || []
                            });

                            // Simpan data tambahan (misalnya, persentase) ke instance chart jika ada
                            if (chartDataFromLivewire.percentages && chartInstanceProp === 'categoryChartInstance') {
                                this[chartInstanceProp].rawPercentages = chartDataFromLivewire.percentages;
                            }
                        } else {
                            if (ctx) {
                                const context = ctx.getContext('2d');
                                context.clearRect(0, 0, ctx.width, ctx.height);
                                context.font = '16px Arial';
                                context.textAlign = 'center';
                                context.fillText('Tidak ada data untuk chart ini', ctx.width / 2, ctx.height / 2);
                            }
                            // console.warn(`Data tidak valid atau canvas tidak ditemukan untuk ${canvasId}`);
                        }
                    };

                    const categoryChartOptions = {
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || context.label || '';
                                        if (label) { label += ': '; }
                                        const value = context.parsed;
                                        const percentage = context.chart.rawPercentages && context.chart.rawPercentages[context.dataIndex] !== undefined
                                                            ? context.chart.rawPercentages[context.dataIndex]
                                                            : null; // Handle jika persentase tidak ada
                                        if (value !== null) {
                                            label += value;
                                            if (percentage !== null) {
                                                label += ` (${percentage}%)`;
                                            }
                                        }
                                        return label;
                                    }
                                }
                            },
                            legend: { position: 'right' },
                            // Contoh jika menggunakan chartjs-plugin-datalabels:
                            datalabels: {
                                 formatter: (value, ctx) => {
                                     const percentage = ctx.chart.rawPercentages && ctx.chart.rawPercentages[ctx.dataIndex] !== undefined
                                                         ? ctx.chart.rawPercentages[ctx.dataIndex] : 0;
                                     return Math.round(percentage) + '%'; // Bulatkan persentase
                                 },
                                 color: '#fff', // Warna teks label
                                 font: { weight: 'bold' }
                             }
                        }
                    };

                    const regionChartOptions = {
                        scales: {
                            y: {
                                beginAtZero: true,
                                // Untuk mengatur sumbu Y maks jika perlu, misal jika data persentase
                                // max: 100, // Aktifkan jika data wilayah adalah persentase 0-100
                                // suggestedMax: Math.max(...(initialRegionData?.datasets?.[0]?.data || [10])) + 10 // Dinamis
                            }
                        },
                        plugins: { legend: { display: true } } // Tampilkan legend jika label dataset penting
                    };

                    const monthlyTrendOptions = { scales: { y: { beginAtZero: true } } };

                    initSpecificChart('categoryChart', 'categoryChartInstance', 'doughnut', initialCategoryData, categoryChartOptions);
                    initSpecificChart('regionChart', 'regionChartInstance', 'bar', initialRegionData, regionChartOptions);
                    initSpecificChart('monthlyTrendChart', 'monthlyTrendChartInstance', 'line', initialMonthlyTrendData, monthlyTrendOptions);
                },

                updateAllCharts(eventDetail) {
                    // Logika update mirip dengan init, pastikan data valid sebelum update
                    const updateSpecificChart = (chartInstanceProp, chartDataFromLivewire, customOptions = {}) => {
                         if (this[chartInstanceProp] && chartDataFromLivewire &&
                            typeof chartDataFromLivewire === 'object' &&
                            Array.isArray(chartDataFromLivewire.labels) && chartDataFromLivewire.labels.length > 0 &&
                            Array.isArray(chartDataFromLivewire.datasets) && chartDataFromLivewire.datasets.length > 0 &&
                            Array.isArray(chartDataFromLivewire.datasets[0].data) && chartDataFromLivewire.datasets[0].data.length > 0)
                        {
                            this[chartInstanceProp].data.labels = chartDataFromLivewire.labels;
                            this[chartInstanceProp].data.datasets = chartDataFromLivewire.datasets;
                            if (chartDataFromLivewire.percentages && chartInstanceProp === 'categoryChartInstance') {
                                this[chartInstanceProp].rawPercentages = chartDataFromLivewire.percentages;
                            }
                            // Jika ada perubahan options, bisa di-assign juga
                            // Object.assign(this[chartInstanceProp].options, customOptions);
                            this[chartInstanceProp].update();
                        } else {
                            // Jika chart belum ada atau data baru tidak valid, coba re-init (atau tampilkan pesan)
                            const canvasId = chartInstanceProp.replace('Instance', ''); // Dapatkan ID canvas dari nama instance
                             this.initCharts(); // Re-init semua chart, atau bisa lebih spesifik
                            // console.warn(`Gagal update chart ${chartInstanceProp}, data tidak valid atau instance tidak ada.`);
                        }
                    };

                    updateSpecificChart('categoryChartInstance', eventDetail.categoryData, { /* opsi kategori baru jika ada */ });
                    updateSpecificChart('regionChartInstance', eventDetail.regionData, { /* opsi region baru jika ada */ });
                    updateSpecificChart('monthlyTrendChartInstance', eventDetail.monthlyTrendData, { /* opsi tren baru jika ada */ });
                }
            }
        }
    </script>
    @endpush
</x-layout>