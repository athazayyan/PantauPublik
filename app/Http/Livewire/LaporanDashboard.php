<?php

namespace App\Http\Livewire; // Pastikan namespace ini benar

use Livewire\Component;
use App\Models\Laporan; // Pastikan model Laporan ada dan namespace-nya benar
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon; // Untuk manipulasi tanggal

class LaporanDashboard extends Component
{
    use WithPagination;

    public $title = 'Portal Laporan Masyarakat'; // Anda bisa sesuaikan ini

    // Statistik
    public $totalLaporan;
    public $pendingLaporan;
    public $inProgressLaporan;
    public $completedLaporan;

    // Data untuk Chart (inisialisasi sebagai array kosong untuk menghindari error jika data belum ada)
    public $categoryChartData = [];
    public $regionChartData = [];
    public $monthlyTrendData = [];

    // Untuk Filter (nilai awal string kosong)
    public $filterKategori = '';
    public $filterWilayah = '';
    public $filterStatus = '';

    // Listener untuk event dari komponen lain (misal setelah laporan baru dibuat)
    protected $listeners = ['laporanCreated' => 'refreshData'];

    // Hook untuk mereset paginasi saat filter berubah
    public function updatingFilterKategori() { $this->resetPage(); }
    public function updatingFilterWilayah() { $this->resetPage(); }
    public function updatingFilterStatus() { $this->resetPage(); }

    /**
     * Method yang dipanggil saat komponen pertama kali di-mount.
     */
    public function mount()
    {
        $this->loadData();
    }

    /**
     * Method untuk memuat/memperbarui semua data yang dibutuhkan oleh dashboard.
     */
    public function loadData()
    {
        // 1. Ambil Data Statistik
        $this->totalLaporan = Laporan::count();
        // Sesuaikan string status ('Menunggu', 'Diproses', 'Selesai') dengan yang ada di database Anda
        $this->pendingLaporan = Laporan::where('status', 'Menunggu')->count();
        $this->inProgressLaporan = Laporan::where('status', 'Diproses')->count();
        $this->completedLaporan = Laporan::where('status', 'Selesai')->count();

        // 2. Ambil dan Format Data untuk Category Chart
        $categoryDataRaw = Laporan::select('kategori', DB::raw('count(*) as total'))
                            ->groupBy('kategori')
                            ->orderBy('total', 'desc')
                            ->take(6) // Ambil misalnya 6 kategori teratas
                            ->get();

        // AWAL BLOK TAMBAHAN UNTUK MENGHITUNG PERSENTASE
        $categoryLabels = $categoryDataRaw->pluck('kategori')->toArray();
        $categoryTotals = $categoryDataRaw->pluck('total')->toArray();
        $categoryPercentages = [];

        // Tentukan pembagi untuk persentase.
        // Pilihan 1: Berdasarkan total dari kategori yang ditampilkan di chart
        $totalLaporanForCategoryPercentage = $categoryDataRaw->sum('total');

        // Pilihan 2 (jika Anda ingin persentase dari SEMUA laporan, uncomment baris di bawah):
        // Pastikan $this->totalLaporan sudah dihitung dengan benar sebelumnya (jumlah semua laporan)
        // if ($this->totalLaporan > 0) {
        //     $totalLaporanForCategoryPercentage = $this->totalLaporan;
        // } else {
        //     $totalLaporanForCategoryPercentage = $categoryDataRaw->sum('total'); // Fallback jika totalLaporan 0
        // }


        if ($totalLaporanForCategoryPercentage > 0) {
            $categoryPercentages = $categoryDataRaw->map(function ($item) use ($totalLaporanForCategoryPercentage) {
                return round(($item->total / $totalLaporanForCategoryPercentage) * 100, 1); // 1 angka desimal
            })->toArray();
        } else {
            // Jika tidak ada laporan sama sekali untuk kategori yang ditampilkan, persentase adalah 0
            // Atau jika $totalLaporanForCategoryPercentage adalah 0
            $categoryPercentages = array_fill(0, count($categoryLabels), 0.0);
        }
        // AKHIR BLOK TAMBAHAN UNTUK MENGHITUNG PERSENTASE

        // SEKARANG ISI $this->categoryChartData DENGAN DATA PERSENTASE
        $this->categoryChartData = [
            'labels' => $categoryLabels, // Gunakan $categoryLabels yang sudah dibuat
            'datasets' => [[
                'label' => 'Laporan berdasarkan Kategori',
                'data' => $categoryTotals, // Tetap kirim data absolut untuk nilai chart
                'backgroundColor' => [ // Sediakan warna yang cukup atau buat logika dinamis
                    'rgba(54, 162, 235, 0.8)', 'rgba(75, 192, 192, 0.8)',
                    'rgba(255, 99, 132, 0.8)', 'rgba(255, 206, 86, 0.8)',
                    'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'
                ],
                'borderWidth' => 1
            ]],
            // Tambahkan data persentase agar bisa diakses oleh JavaScript
            'rawTotals' => $categoryTotals, // Bisa berguna juga untuk tooltip
            'percentages' => $categoryPercentages,
        ];

        // 3. Ambil dan Format Data untuk Region Chart
        // Pastikan nama kolom untuk wilayah adalah 'lokasi' atau sesuaikan
        $regionDataRaw = Laporan::select('lokasi', DB::raw('count(*) as total'))
                            ->groupBy('lokasi')
                            ->orderBy('total', 'desc')
                            ->take(5) // Ambil misalnya 5 wilayah teratas
                            ->get();
        $this->regionChartData = [
            'labels' => $regionDataRaw->pluck('lokasi')->toArray(),
            'datasets' => [[
                'label' => 'Jumlah Laporan per Wilayah',
                'data' => $regionDataRaw->pluck('total')->toArray(),
                'backgroundColor' => 'rgba(75, 192, 192, 0.8)', // Bisa juga array warna
                'borderWidth' => 1
            ]]
        ];

        // 4. Ambil dan Format Data untuk Monthly Trend Chart (MODIFIKASI UNTUK SQLite)
        $currentYear = date('Y'); // Dapatkan tahun saat ini

        // Daftar nama bulan untuk label chart
        $monthLabels = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->isoFormat('MMM'); // Jan, Feb, Mar, dst.
        })->all();

        // Ambil total laporan per bulan untuk tahun ini menggunakan strftime untuk SQLite
        $totalLaporanTrendRaw = Laporan::select(
                                        // Gunakan strftime untuk mendapatkan nomor bulan (format '%m' menghasilkan '01', '02', ...)
                                        DB::raw("strftime('%m', tanggal) as month_str"),
                                        DB::raw('count(*) as total')
                                    )
                                    // Gunakan strftime untuk memfilter berdasarkan tahun
                                    ->where(DB::raw("strftime('%Y', tanggal)"), (string)$currentYear)
                                    ->groupBy('month_str')
                                    ->orderBy('month_str', 'asc') // Urutkan berdasarkan string bulan
                                    ->pluck('total', 'month_str'); // Hasilnya ['01' => 10, '02' => 15, ...]

        // Ambil laporan selesai per bulan untuk tahun ini menggunakan strftime untuk SQLite
        $completedLaporanTrendRaw = Laporan::select(
                                        DB::raw("strftime('%m', tanggal) as month_str"),
                                        DB::raw('count(*) as total')
                                    )
                                    ->where('status', 'Selesai')
                                    ->where(DB::raw("strftime('%Y', tanggal)"), (string)$currentYear)
                                    ->groupBy('month_str')
                                    ->orderBy('month_str', 'asc')
                                    ->pluck('total', 'month_str');

        // Siapkan array data dengan nilai 0 untuk semua bulan (kunci sekarang string '01' - '12')
        $totalDataPoints = array_fill_keys(array_map(fn($m) => sprintf('%02d', $m), range(1,12)), 0);
        $completedDataPoints = array_fill_keys(array_map(fn($m) => sprintf('%02d', $m), range(1,12)), 0);

        // Isi data yang ada dari query
        foreach($totalLaporanTrendRaw as $monthStr => $total) {
            if (isset($totalDataPoints[$monthStr])) {
                $totalDataPoints[$monthStr] = $total;
            }
        }
        foreach($completedLaporanTrendRaw as $monthStr => $total) {
             if (isset($completedDataPoints[$monthStr])) {
                $completedDataPoints[$monthStr] = $total;
            }
        }

        $this->monthlyTrendData = [
            'labels' => $monthLabels, // Label tetap 'Jan', 'Feb', ...
            'datasets' => [
                [
                    'label' => 'Total Laporan',
                    'data' => array_values($totalDataPoints), // Data dari array yang sudah diisi
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2, 'fill' => true, 'tension' => 0.3
                ],
                [
                    'label' => 'Laporan Selesai',
                    'data' => array_values($completedDataPoints),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 2, 'fill' => true, 'tension' => 0.3
                ]
            ]
        ];
    }

    /**
     * Method yang dipanggil ketika event 'laporanCreated' diterima.
     * Ini akan memuat ulang data dan memberi tahu browser untuk memperbarui chart.
     */
    public function refreshData()
    {
        $this->loadData(); // Muat ulang semua data
        $this->dispatchBrowserEvent('charts-updated', [
            'categoryData' => $this->categoryChartData,
            'regionData'   => $this->regionChartData,
            'monthlyTrendData' => $this->monthlyTrendData,
        ]);
    }

    /**
     * Method render yang akan menampilkan view dan melewatkan data.
     */
    public function render()
    {
        $query = Laporan::query();

        // Terapkan filter jika ada nilainya
        if (!empty($this->filterKategori)) {
            $query->where('kategori', $this->filterKategori);
        }
        if (!empty($this->filterWilayah)) {
            // Pastikan nama kolom untuk wilayah adalah 'lokasi' atau sesuaikan
            $query->where('lokasi', $this->filterWilayah);
        }
        if (!empty($this->filterStatus)) {
            $query->where('status', $this->filterStatus);
        }

        // Ambil data laporan terbaru dengan paginasi
        $recentLaporan = $query->latest('tanggal') // Urutkan berdasarkan tanggal terbaru
                               ->paginate(10); // Sesuaikan jumlah item per halaman

        // Kembalikan view dengan data yang diperlukan
        // Pastikan nama view dan path layout sudah benar
        return view('livewire.laporan-dashboard', [
            'recentLaporan' => $recentLaporan,
        ])->layout('components.layout'); // Ganti 'components.layout' jika path layout Anda berbeda
    }
}