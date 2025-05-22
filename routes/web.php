<?php

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Logout Berhasil');
})->name('logout');


Route::get('/', function () {
    return view('welcome', ['title'=>'PantauPublik',
'laporans'=>laporan::all(),
'sekilas'=>laporan::latest()->take(3)->get(),
'pelapor'=>User::all()]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
   Route::get('/laporan/edit/{laporan}', [LaporanController::class, 'edit'])->name('laporan.edit');

Route::put('/laporan/edit/{laporan}', [LaporanController::class, 'update'])->name('laporan.update');
Route::delete('/laporan/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');


});




Route::get('/laporan', function () {
    return view('semualaporan', ['title'=>'laporan', 'laporans'=>Laporan::all()]);
});

Route::get('/portal', [PortalController::class, 'index'])->name('portal.index');

Route::get('/login', function () {
    return view('auth.login');

});


Route::get('/register', function () {
    return view('auth.register');

});






Route::get('/laporan/{id}', function ($id) {
    $laporan = Laporan::with('pelapor')->findOrFail($id);

    return view('detail', [
        'title' => 'Detail Laporan',
        'laporan' => $laporan,
    ]);
})->name('laporan.show');

Route::get('/pelapor/{user}', function (User $user) {
    return view('pelapor', [
        'title' => 'Pelapor',
        'laporans' => $user->laporans,
        'user' => $user
    ]);
})->name('pelapor');



//Laporan


