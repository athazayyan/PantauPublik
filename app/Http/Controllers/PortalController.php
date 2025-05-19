<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    public function index()
    {
        // Fetch statistics
        $totalLaporan = Laporan::count();
        $ringanLaporan = Laporan::where('status', 'Ringan')->count();
        $sedangLaporan = Laporan::where('status', 'Sedang')->count();
        $beratLaporan = Laporan::where('status', 'Berat')->count();

        // Fetch data for category chart
        $categoryData = Laporan::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori')
            ->toArray();

        // Fetch data for region chart
        $regionData = Laporan::select('lokasi', DB::raw('count(*) as total'))
            ->groupBy('lokasi')
            ->pluck('total', 'lokasi')
            ->toArray();

        // Fetch data for monthly trend chart (last 12 months)
        $monthlyData = Laporan::select(
            DB::raw('strftime("%m", tanggal) as month_num'),
            DB::raw('count(*) as total'),
            DB::raw('sum(case when status = "Selesai" then 1 else 0 end) as completed')
        )
            ->where('tanggal', '>=', now()->subMonths(12))
            ->groupBy('month_num')
            ->orderBy('month_num')
            ->get();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $monthlyTotals = array_fill_keys($months, 0);
        $monthlyCompleted = array_fill_keys($months, 0);
        $monthlyBeratLaporan = array_fill(0, $beratLaporan, 0); // Using array_fill instead of array_fill_keys


        foreach ($monthlyData as $data) {
            $monthIndex = intval($data->month_num) - 1;
            if ($monthIndex >= 0 && $monthIndex < 12) {
                $month = $months[$monthIndex];
                $monthlyTotals[$month] = $data->total;
                $monthlyCompleted[$month] = $data->completed;
            }
        }
        // Fetch recent reports with pagination
        $recentLaporan = Laporan::latest()->paginate(10);

        // Pass the title and data to the view
        return view('portal', [
            'title' => 'Portal',
            'totalLaporan' => $totalLaporan,
            'ringanLaporan' => $ringanLaporan,
            'sedangLaporan' => $sedangLaporan,
            'beratLaporan' => $beratLaporan,
            'categoryData' => $categoryData,
            'regionData' => $regionData,
            'monthlyTotals' => $monthlyTotals,
            'monthlyBeratLaporan' => $monthlyBeratLaporan,
            'recentLaporan' => $recentLaporan,
        ]);
    }
}