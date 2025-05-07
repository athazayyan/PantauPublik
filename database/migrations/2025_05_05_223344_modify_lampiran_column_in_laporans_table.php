<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            // Hapus kolom lama jika sudah tidak dipakai
            // $table->dropColumn('lampiran_path'); // Hati-hati jika sudah ada data

            // Tambahkan kolom baru untuk menyimpan array path sebagai JSON
            // Gunakan 'json' jika DB Anda mendukungnya (MySQL 5.7+, PostgreSQL, etc.)
            // Gunakan 'text' untuk kompatibilitas lebih luas, lalu cast di model
            $table->text('lampiran_paths')->nullable()->after('pelapor_id'); // Atau ->json(...)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropColumn('lampiran_paths');

            // Jika Anda menghapus kolom lama di 'up', tambahkan kembali di 'down'
            // $table->string('lampiran_path')->nullable()->after('pelapor_id');
        });
    }
};