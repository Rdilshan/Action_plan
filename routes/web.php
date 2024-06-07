<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware(['login'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/test', function () {
        return view('test');
    });
});


Route::get('/login', function () {
    return view('login');
});

Route::post('/login',  [UserController::class, 'login']);
Route::get('/useradding', function () {
    return view('useradding');
});
