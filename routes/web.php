<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HierarchyController;
use App\Http\Controllers\TaskController;



Route::middleware(['login'])->group(function () {
    // admin route start here
    Route::get('/', function () {return view('welcome');})->middleware('checkAdmin');
    Route::get('/test', function () {return view('test');});
    Route::get('/useradding', [RoleController::class, 'index'])->middleware('checkAdmin');
    Route::post('/useradding', [UserController::class, 'register'])->middleware('checkAdmin');
    Route::get('/listuser', [UserController::class, 'getalluser'])->middleware('checkAdmin');
    Route::delete('/listuser/{id}', [UserController::class, 'deleteUser'])->middleware('checkAdmin');

    #goal adding
    Route::post('/addgoal', [HierarchyController::class, 'addgoal'])->middleware('checkAdmin');
    Route::get('/viewblog', [HierarchyController::class, 'indexGoals'])->middleware('checkAdmin');
    Route::delete('/deletegoal/{id}', [HierarchyController::class, 'deleteGoal'])->middleware('checkAdmin');
    Route::put('/editgoal/{id}', [HierarchyController::class, 'editGoal'])->middleware('checkAdmin');

    #objective adding
    Route::get('/viewObjective/{id}/{id2}', [HierarchyController::class, 'getObjectives'])->middleware('checkAdmin');
    Route::post('/addObjective', [HierarchyController::class, 'addObjective'])->middleware('checkAdmin');
    Route::delete('/deleteObjective/{id}', [HierarchyController::class, 'deleteObjective'])->middleware('checkAdmin');
    Route::put('/editObjective/{id}', [HierarchyController::class, 'editObjective'])->middleware('checkAdmin');

    #viewstrategy adding
    Route::get('/viewstrategy/{id}/{id2}', [HierarchyController::class, 'getStrategies'])->middleware('checkAdmin');
    Route::post('/addstrategy', [HierarchyController::class, 'addstrategy'])->middleware('checkAdmin');
    Route::delete('/deletestrategy/{id}', [HierarchyController::class, 'deletestrategy'])->middleware('checkAdmin');
    Route::put('/editstrategy/{id}', [HierarchyController::class, 'editstrategy'])->middleware('checkAdmin');

    #viewaction adding
    Route::get('/viewaction/{id}/{id2}', [HierarchyController::class, 'getActions'])->middleware('checkAdmin');
    Route::post('/addaction', [HierarchyController::class, 'addaction'])->middleware('checkAdmin');
    Route::delete('/deleteaction/{id}', [HierarchyController::class, 'deleteaction'])->middleware('checkAdmin');
    Route::put('/editaction/{id}', [HierarchyController::class, 'editaction'])->middleware('checkAdmin');

    #viewSubaction adding
    Route::get('/viewSubaction/{id}/{id2}', [HierarchyController::class, 'getSubactions'])->middleware('checkAdmin');
    Route::post('/addSubaction', [HierarchyController::class, 'addSubaction'])->middleware('checkAdmin');
    Route::delete('/deleteSubaction/{id}', [HierarchyController::class, 'deleteSubaction'])->middleware('checkAdmin');
    Route::put('/editSubaction/{id}', [HierarchyController::class, 'editSubaction'])->middleware('checkAdmin');
    // admin route end here

    //user route start here
    Route::get('/user', function () {return view('user.dashboard');})->middleware('checkUser');
    Route::get('/addtask', [HierarchyController::class, 'getallGoaltouser'])->middleware('checkUser');
    Route::get('/getObjectives/{goalId}', [HierarchyController::class, 'getallObjectivetouser']) ->middleware('checkUser');
    Route::get('/getStrategy/{objective}', [HierarchyController::class, 'getallgetStrategytouser'])->middleware('checkUser');
    Route::get('/getAction/{strategy}', [HierarchyController::class, 'getallgetActiontouser'])->middleware('checkUser');
    Route::get('/getSubAction/{action}', [HierarchyController::class, 'getallgetSubActiontouser'])->middleware('checkUser');

    Route::get('/addnewtask', function () {return view('user.TaskAdding');});
    Route::post('/addnewtask', [TaskController::class, 'store']);

    Route::get('/listTask', [TaskController::class, 'owntasklist']);
    Route::delete('/deletetask/{id}', [TaskController::class, 'deleteTask']);


    //user route end here
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);



// page only
Route::get('/unauthorized', function () {return view('Authentication.unauthorized');});

Route::get('/viewTask/{id}/{id2}', function () {
    return view("viewTask");
});

