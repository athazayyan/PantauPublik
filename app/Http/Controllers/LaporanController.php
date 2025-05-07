<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar semua laporan.
     */
    public function index() // <<-- METHOD INI YANG HILANG
    {
        // Ambil data laporan dengan pagination
        // Eager load relasi 'pelapor' untuk efisiensi
        // Urutkan berdasarkan yang terbaru
        $laporans = Laporan::with('pelapor')->latest()->paginate(9); // Ganti 9 dengan jumlah item per halaman yang Anda inginkan

        // Kirim data ke view
        // Pastikan nama view 'laporan.index' atau 'semualaporan' sudah benar
        return view('semualaporan', [ // atau 'semualaporan' jika itu nama view Anda
            'title' => 'Daftar Semua Laporan',
            'laporans' => $laporans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.create', [
            'title' => 'Buat Laporan Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'lampiran' => 'sometimes|array',
            'lampiran.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Ditambahkan webp, svg
        ]);

        $validated['pelapor_id'] = Auth::id();

        $lampiranPaths = [];
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $path = $file->store('laporan_files', 'public');
                $lampiranPaths[] = $path;
            }
        }
        $validated['lampiran_paths'] = $lampiranPaths;

        $laporan = Laporan::create($validated);

        return redirect()->route('laporan.show', $laporan->id)
                         ->with('success', 'Laporan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
     public function show(Laporan $laporan)
     {
         // Dengan Route Model Binding, $laporan sudah otomatis di-load.
         // Jika Anda mengakses view ini dan $laporan tidak ditemukan (misal ID salah di URL),
         // Laravel akan otomatis menampilkan halaman 404.
         // Jadi, pengecekan if (!$laporan) tidak selalu diperlukan di sini.

         // Eager load relasi pelapor jika belum dilakukan di query utama (jika diperlukan di view show)
         // $laporan->loadMissing('pelapor'); // loadMissing hanya akan load jika belum ada

         return view('laporan.show', [
            'title' => 'Detail Laporan: ' . $laporan->judul, // Menambahkan judul ke title
            'laporan' => $laporan
         ]);
     }

    // Tambahkan method lain jika perlu (edit, update, destroy)
}