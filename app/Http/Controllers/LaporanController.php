<?php
namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function create()
    {
        return view('laporan.create', [
            'title' => 'Buat Laporan Baru',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'tanggal' => 'required|date',
        ]);

        $validated['pelapor_id'] = Auth::id();

        $laporan = Laporan::create($validated);

        return redirect()->route('laporan.show', $laporan->id)
                         ->with('success', 'Laporan berhasil dibuat!');
    }
}

