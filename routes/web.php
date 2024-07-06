<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HierarchyController;



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
    Route::post('/useradding', [UserController::class, 'register'])->middleware('checkAdmin');


    Route::get('/listuser', [UserController::class, 'getalluser']);


    Route::delete('/listuser/{id}', [UserController::class, 'deleteUser'])->middleware('checkAdmin');

    #goal adding
    Route::post('/addgoal', [HierarchyController::class, 'addgoal']);
    Route::get('/viewblog', [HierarchyController::class, 'indexGoals']);
    Route::delete('/deletegoal/{id}', [HierarchyController::class, 'deleteGoal']);
    Route::put('/editgoal/{id}', [HierarchyController::class, 'editGoal']);

    #objective adding
    Route::get('/viewObjective/{id}/{id2}', [HierarchyController::class, 'getObjectives']);
    Route::post('/addObjective', [HierarchyController::class, 'addObjective']);
    Route::delete('/deleteObjective/{id}', [HierarchyController::class, 'deleteObjective']);
    Route::put('/editObjective/{id}', [HierarchyController::class, 'editObjective']);

    #viewstrategy adding
    Route::get('/viewstrategy/{id}/{id2}', [HierarchyController::class, 'getStrategies']);
    Route::post('/addstrategy', [HierarchyController::class, 'addstrategy']);
    Route::delete('/deletestrategy/{id}', [HierarchyController::class, 'deletestrategy']);
    Route::put('/editstrategy/{id}', [HierarchyController::class, 'editstrategy']);


});
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);



// page only


Route::get('/viewstrategy', function () {
    return view("Viewstrategy");
});
Route::get('/viewaction', function () {
    return view("Viewaction");
});

Route::get('/viewSubaction', function () {
    return view("Viewsubaction");
});

