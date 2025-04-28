<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
        protected $fillable = ['judul', 'deskripsi', 'lokasi', 'status', 'kategori', 'tanggal'];

}
