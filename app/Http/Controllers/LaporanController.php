<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
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
        'lampiran' => 'nullable|array',
        'lampiran.*' => 'file|max:5120', // 5MB
    ]);

    // 1. Simpan laporan terlebih dahulu untuk dapat ID
    $laporan = Laporan::create([
        'judul' => $validated['judul'],
        'deskripsi' => $validated['deskripsi'],
        'lokasi' => $validated['lokasi'],
        'status' => $validated['status'],
        'kategori' => $validated['kategori'],
        'tanggal' => $validated['tanggal'],
        'pelapor_id' => Auth::id(),
        'lampiran' => json_encode([]), // sementara kosong
    ]);

    // 2. Simpan lampiran dengan nama custom
    $lampiranPaths = [];

    if ($request->hasFile('lampiran')) {
        foreach ($request->file('lampiran') as $index => $file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $laporan->id . '_' . ($index + 1) . '.' . $extension;
            $path = $file->storeAs('lampiran', $fileName, 'public');
            $lampiranPaths[] = $path;
        }

        // 3. Update kembali laporan dengan lampiran yang sudah disimpan
        $laporan->update([
            'lampiran' => json_encode($lampiranPaths),
        ]);
    }

    return redirect()->route('laporan.show', $laporan->id)
                     ->with('success', 'Laporan berhasil dibuat!');
}

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

}
