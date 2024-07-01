<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;



Route::middleware(['login'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('checkAdmin');

    Route::get('/test', function () {
        return view('test');
    });
    Route::get('/useradding', [RoleController::class, 'index'])->middleware('checkAdmin');

    Route::get('/user', function () {
        return view('user');
    });

    Route::get('/listuser', [UserController::class, 'getalluser']);


});
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::post('/useradding', [UserController::class, 'register']);


// page only

Route::get('/viewblog', function () {
    return view("Viewgoal");
});
Route::get('/viewObjective', function () {
    return view("ViewObjective");
});
Route::get('/viewstrategy', function () {
    return view("Viewstrategy");
});
Route::get('/viewaction', function () {
    return view("Viewaction");
});

Route::get('/viewSubaction', function () {
    return view("Viewsubaction");
});

