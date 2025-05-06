<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    // Update $fillable
    protected $fillable = [
        'judul',
        'deskripsi',
        'lokasi',
        'status',
        'kategori',
        'tanggal',
        'pelapor_id',
        'lampiran_paths', // Ganti nama kolom
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // Cast kolom 'lampiran_paths' ke array PHP secara otomatis
        'lampiran_paths' => 'array',
        'tanggal' => 'date', // Pastikan cast lain tetap ada jika perlu
    ];

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }
}