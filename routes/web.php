<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;



Route::middleware(['login'])->group(function () {
    Route::middleware(['checkAdmin'])->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/test', function () {
            return view('test');
        });
        Route::get('/useradding', [RoleController::class,'index']);

    });


});
Route::get('/login', function () {
    return view('login');
});

Route::post('/login',  [UserController::class, 'login']);
Route::get('/logout',  [UserController::class, 'logout']);

Route::post('/useradding',  [UserController::class, 'register']);






