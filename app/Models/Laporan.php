<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'lokasi',
        'status',
        'kategori',
        'tanggal',
        'pelapor_id',
        'lampiran', // kolom array untuk menyimpan path file
    ];

    protected $casts = [
        'lampiran' => 'array', // auto-cast ke array
        'tanggal' => 'date',
    ];

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }
}
