<?php

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome', ['title'=>'PantauPublik']);
});



Route::get('/laporan', function () {
    return view('semualaporan', ['title'=>'laporan', 'laporans'=>Laporan::all()]);
});

Route::get('/portal', function () {
    return view('portal', ['title'=>'Portal']);

});

Route::get('/login', function () {
    return view('auth.login');

});


Route::get('/register', function () {
    return view('auth.register');

});


Route::get('/lapor', function () {
    return view('laporan' , ['title'=>'Lapor']);

});



Route::get('/laporan/{id}', function ($id) {
    $laporan = Arr::first(Laporan::all(), function($laporan) use ($id) {
        return $laporan['id'] == $id;
    });
    return view('detail', [
        'title'=>'Detail Laporan',
        'laporan'=>$laporan
    ]);
});

Route::get('/pelapor/{user}', function (User $user) {
    return view('pelapor', [
        'title' => 'Pelapor',
        'laporans' => $user->laporans,
        'user' => $user
    ]);
})->name('pelapor');


