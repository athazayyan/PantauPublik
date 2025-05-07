<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// Jangan import Route di sini jika tidak dipakai di dalam method
// use Illuminate\Support\Facades\Route; // <-- Hapus atau jangan tambahkan ini

class LaporanController extends Controller
{
    // DEFINISI ROUTE TIDAK BOLEH DI SINI

    // ===== TAMBAHKAN METHOD INI KEMBALI =====
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Hanya menampilkan view form
        return view('laporan.create', [
            'title' => 'Buat Laporan Baru', // Anda bisa set title atau data lain jika perlu
        ]);
    }
    // =========================================


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
            'lampiran.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        // Pastikan route 'laporan.show' sudah didefinisikan di routes/web.php
        // Dan method show() ada di controller ini
        return redirect()->route('laporan.show', $laporan->id)
                         ->with('success', 'Laporan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
     public function show(Laporan $laporan) // Pastikan parameter sama dengan di route definition
     {
         // Cek apakah $laporan ditemukan (jika menggunakan Route Model Binding)
         if (!$laporan) {
             abort(404); // Atau redirect ke halaman lain
         }

         // Kirim data laporan ke view
         return view('laporan.show', compact('laporan'));
     }

    // Tambahkan method lain jika perlu (index, edit, update, destroy)
}