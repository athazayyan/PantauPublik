<?php

use Illuminate\Support\Facades\Route;

class laporan{
    public static function all()
    {
        return view('semualaporan');
    }
}

Route::get('/', function () {
    return view('welcome', ['title'=>'PantauPublik']);
});



Route::get('/laporan', function () {
    return view('semualaporan', ['title'=>'laporan']);
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

