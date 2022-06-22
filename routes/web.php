<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project/create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
Route::get('/project/{project}/index', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
Route::get('/project/list', [\App\Http\Controllers\ProjectController::class, 'show'])->name('project.list');

Route::post('/project/store', [\App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}/update', [\App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{project}/destroy', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');

Route::get('/project/{project}/student/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::post('/project/{project}/student/store', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
Route::delete('/student/{student}/destroy', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
Route::put('/student/update/{group}', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
Route::put('/student/{student}', [\App\Http\Controllers\StudentController::class, 'unassign'])->name('student.unassign');



Route::post('/groups/students/store', [\App\Http\Controllers\GroupController::class, 'store'])->name('groups.store');





