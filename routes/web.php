<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
})->middleware('login');


Route::get('/login', function () {
    return view('login');
});

Route::post('/login',  [UserController::class, 'login']);
