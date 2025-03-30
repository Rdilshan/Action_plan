<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HierarchyController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\WordController;





Route::middleware(['login', 'cors'])->group(function () {
    // admin route start here
    // Route::get('/', function () {return view('welcome');})->middleware('checkAdmin');
    Route::get('/', [TreeController::class, 'welcomeindex'])->middleware('checkAdmin');

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

    //form
    Route::get('/Admin/addnewtask/first', function () {return view('Admin_task_form');})->middleware('checkAdmin');
    Route::post('/admin/addnewtask/first', [TaskController::class, 'Adminstore'])->middleware('checkAdmin');
    Route::get('/admin/addnewtask/second', function () {return view('Tabledatainsert');})->middleware('checkAdmin');
    Route::post('/admin/addnewtask/final', [TaskController::class, 'AdminstoreFinalForm'])->middleware('checkAdmin');

    //view all task
    Route::get('/admin_alltask', [TaskController::class, 'Adminviewalltask'])->middleware('checkAdmin');
    Route::get('/admin/view/user/task/{id}', [TaskController::class, 'adminvieweoncetTask'])->middleware('checkAdmin');
    Route::get('/admin_addtask', [HierarchyController::class, 'admingetallGoaltouser'])->middleware('checkAdmin');
    Route::get('/admin/edit/task/{id}', [TaskController::class, 'admineditTask'])->middleware('checkAdmin');
    Route::post('/admin/edit/task/{id}', [TaskController::class, 'adminupdateTask'])->middleware('checkAdmin');

    //update
    Route::get('/admin/yearbyyear/{id}', [TaskController::class, 'Adminupdatesget'])->middleware('checkAdmin');
    Route::post('/admin/updatesubmitform/{id}', action: [TaskController::class, 'adminupdatetasksubmit'])->middleware('checkAdmin');
    Route::post('/admin/editupdatesubmitform', action: [TaskController::class, 'admineditupdatesubmitform'])->middleware('checkAdmin');


    // admin route end here

    //user route start here
    Route::get('/user',[UserController::class, 'dashboardDataload'] )->middleware('checkUser');

    Route::get('/addtask', [HierarchyController::class, 'getallGoaltouser'])->middleware('checkUser');
    Route::get('/getObjectives/{goalId}', [HierarchyController::class, 'getallObjectivetouser']) ;//admin and user both
    Route::get('/getStrategy/{objective}', [HierarchyController::class, 'getallgetStrategytouser']);//admin and user both
    Route::get('/getAction/{strategy}', [HierarchyController::class, 'getallgetActiontouser']);//admin and user both
    Route::get('/getSubAction/{action}', [HierarchyController::class, 'getallgetSubActiontouser']);//admin and user both

    //user add the new task
    Route::get('/addnewtask/first', function () {return view('user.TaskAdding');})->middleware('checkUser');
    Route::post('/addnewtask/first', [TaskController::class, 'store'])->middleware('checkUser');
    Route::get('/addnewtask/second', function () {
        return view('user.Tabledatainsert');
    })->middleware('checkUser');
    Route::post('/addnewtask/final', [TaskController::class, 'storeFinalForm'])->middleware('checkUser');

    //view task on user side & admin side
    Route::get('/listTask', [TaskController::class, 'owntasklist'])->middleware('checkUser');
    Route::delete('/deletetask/{id}', [TaskController::class, 'deleteTask']);
    Route::get('/viewTask/{id}/{id2}', [TaskController::class, 'selecttasklist'])->middleware('checkAdmin');

    //task edit by user
    Route::get('/edit/task/{id}', [TaskController::class, 'editTask'])->middleware('checkUser');
    Route::delete('/deleteTabledata/{id1}/{id2}', [TaskController::class, 'deleteTabledata']);
    Route::post('/edit/task/{id}', [TaskController::class, 'updateTask']);



    //view task in All user
    Route::get('/AlllistTask', [TaskController::class, 'viewalltask'])->middleware('checkUser');
    Route::get('/view/user/task/{id}', [TaskController::class, 'vieweoncetTask']);

    //summary
    Route::get('/summary', [TreeController::class, 'index'])->middleware('checkUser');
    Route::post("/load_data_into_model", [TreeController::class, 'load_data_into_model']);

    Route::get('/word/{id}', [wordController::class, 'generateWordFromTemplate']);//admin and user both

    //year by year update task
    Route::get('/yearbyyear/{id}', [TaskController::class, 'updatesget'])->middleware('checkUser');

    Route::post('/updatesubmitform/{id}', action: [TaskController::class, 'updatetasksubmit']);
    Route::delete('/updatedeletetask/{id}', [TaskController::class, 'updatedeletetask']);  //admin and user both
    Route::post('/updateReviewintask/{id}', action: [TaskController::class, 'updatereviewadd']); //admin and user both
    Route::post('/editupdatesubmitform', action: [TaskController::class, 'editupdatesubmitform'])->middleware('checkUser');

    Route::get('/gettheoneedit/{id}', action: [TaskController::class, 'updatetaskget']); //admin and user both

    Route::get('/test-cors', function () {
        return response()->json(['message' => 'CORS is working!', 'time' => now()]);
    });
    //user route end here
});

// Add CORS to public routes as well
Route::middleware(['cors'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/unauthorized', function () {
        return view('Authentication.unauthorized');
    });
});


