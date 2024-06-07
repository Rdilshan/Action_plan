<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Mail\userRegMail;


Route::middleware(['login'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/test', function () {
        return view('test');
    });
    // Route::get('/useradding', function () {
    //     return view('useradding');
    // });
    Route::get('/useradding', [RoleController::class,'index']);

});
Route::get('/login', function () {
    return view('login');
});

Route::post('/login',  [UserController::class, 'login']);
Route::get('/logout',  [UserController::class, 'logout']);

Route::post('/useradding',  [UserController::class, 'register']);


Route::get('/mailsend',function(){
    Mail::to('rdilshan077788@gmail.com')
    ->send(new userRegMail());
});



