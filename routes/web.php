<?php

use App\Models\Laporan;
use App\Models\User;
// use Illuminate\Support\Arr; // Tidak terpakai, bisa dihapus
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController; // Pastikan ini di-import
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Auth Routes
Route::post('/login', [LoginController::class, 'login'])->name('login.submit'); // Beri nama berbeda jika route GET /login juga ada
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Beri nama berbeda
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// View Routes for Auth (sebaiknya dipisah atau gunakan Laravel Breeze/Jetstream)
Route::get('/login', function () {
    return view('auth.login', ['title' => 'Login']); // Tambahkan title jika perlu
})->name('login'); // Nama 'login' untuk view login

Route::get('/register', function () {
    return view('auth.register', ['title' => 'Register']); // Tambahkan title jika perlu
})->name('register'); // Nama 'register' untuk view register

// Home Page
Route::get('/', function () {
    return view('welcome', ['title'=>'PantauPublik']);
});

// Laporan Routes (Grupkan yang memerlukan auth)
Route::middleware(['auth'])->group(function () {
    // Daftar Laporan (menggunakan controller dan pagination)
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index'); // <<--- PERUBAHAN DI SINI

    // Buat Laporan
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

    // Detail Laporan (menggunakan controller)
    Route::get('/laporan/{laporan}', [LaporanController::class, 'show'])->name('laporan.show'); // Menggunakan Route Model Binding
});


// HAPUS ATAU KOMENTARI INI KARENA SUDAH DITANGANI OLEH CONTROLLER DI ATAS
/*
Route::get('/laporan', function () {
    return view('semualaporan', ['title'=>'laporan', 'laporans'=>Laporan::all()]);
});
*/

// HAPUS ATAU KOMENTARI INI KARENA SUDAH DITANGANI OLEH CONTROLLER DI ATAS
/*
Route::get('/laporan/{id}', function ($id) {
    $laporan = Laporan::with('pelapor')->findOrFail($id);
    return view('detail', [
        'title' => 'Detail Laporan',
        'laporan' => $laporan
    ]);
})->name('laporan.show'); // Akan konflik nama dengan route controller
*/


// Portal Route
Route::get('/portal', function () {
    return view('portal', ['title'=>'Portal']);
});

// Profil Pelapor Route
Route::get('/pelapor/{user}', function (User $user) {
    // Pertimbangkan untuk memindahkan ini ke UserController jika logikanya berkembang
    return view('pelapor', [
        'title' => 'Profil: ' . $user->name,
        'laporans' => $user->laporans()->latest()->paginate(5), // Tambahkan pagination
        'user' => $user
    ]);
})->name('pelapor.profil'); // Ganti nama menjadi 'pelapor.profil' agar konsisten dengan view