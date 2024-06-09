<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/useradding', function () {
    return view('useradding');
});

Route::get('/admin_User', function () {
    return view('admin_User');
});