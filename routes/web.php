<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');

 Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/', [MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
    // Route::get('/adminDashboard/tasks', [MainController::class, 'taskForm']);
     Route::get('/adminDashboard/tasks', [MainController::class, 'tasks']);

    // Route::post('/adminDashboard/addTask', [MainController::class, 'addTask']);
     Route::get('/adminDashboard/addTask', [MainController::class, 'taskForm']);

     Route::post('/adminDashboard/addingTask/{project_id}', [MainController::class, 'addtask']);

    Route::get('/adminDashboard/home', [MainController::class, 'dashboard']);
    Route::get('/adminDashboard/users', [MainController::class, 'showusers']);  
    Route::get('/adminDashboard/show/{id}', [MainController::class, 'showAssign']);
    Route::get('/adminDashboard/viewMembers/{id}', [MainController::class, 'viewMembers']);
    Route::get('/adminDashboard/viewTaskMembers/{id}', [MainController::class, 'viewTaskMembers']);

    Route::get('/adminDashboard/projects', [MainController::class, 'showProjects']); 
    // Route::get('/adminDashboard/removeMember/{user_id}/{project_id}', [MainController::class, 'removeMember']);
    Route::get('/adminDashboard/delete/{id}', [MainController::class, 'deleteData']);
    Route::get('/adminDashboard/edit/{id}', [MainController::class, 'updateData']);
    Route::post('/adminDashboard/update', [MainController::class, 'update']);
    Route::get('/adminDashboard/viewproject/{id}', [MainController::class, 'viewproject']);
    Route::get('/adminDashboard/addProject', [MainController::class, 'addProject']);
    Route::get('/adminDashboard/deleteProject/{id}', [MainController::class, 'deleteProject']);
    Route::get('/adminDashboard/updateProject/{id}', [MainController::class, 'updateProject']);
    Route::post('/adminDashboard/updatingProject', [MainController::class, 'updatingProject']);
    Route::get('/adminDashboard/addProject/test', [MainController::class, 'addingProject']);
    Route::get('/adminDashboard/assignProject/{id}', [MainController::class, 'assignProject']);
    Route::get('/adminDashboard/assignTask/{id}', [MainController::class, 'assignTask']);
    Route::get('/adminDashboard/time/{id}', [MainController::class, 'time']);

    Route::get('/adminDashboard/view/{id}', [MainController::class, 'viewProfile']);
    Route::get('/adminDashboard/viewTask/{id}', [MainController::class, 'viewTask']);
    Route::get('/adminDashboard/deleteTask/{id}', [MainController::class, 'deleteTask']);
    Route::get('/adminDashboard/editTask/{id}', [MainController::class, 'editTaskForm']);
    Route::post('/adminDashboard/updateTask', [MainController::class, 'updateTask']);
   
    Route::get(' /adminDashboard/comments/{id}', [MainController::class, 'comments']);
    Route::post('/adminDashboard/addComment/{id}', [MainController::class, 'addComment']);
    Route::get('/adminDashboard/deleteComment/{id}', [MainController::class, 'deleteComment']);

    Route::get('/adminDashboard/viewProjectTask/{id}', [MainController::class, 'viewProjectTask']);

 

});
