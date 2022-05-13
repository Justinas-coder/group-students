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
Route::get('/project/index', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
Route::post('/project/store', [\App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
