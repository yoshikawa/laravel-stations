<?php

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;
/*
|-------------------------------------------------------------------------
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


Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::get('/admin/movies', [AdminMovieController::class, 'index']);
Route::get('/admin/movies/create', [AdminMovieController::class, 'index']);
Route::post('/admin/movies/store', [AdminMovieController::class, 'store']);
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit']);
Route::patch('/admin/movies/{id}/update', [AdminMovieController::class, 'update']);
Route::delete('/admin/movies/{id}/destroy', [AdminMovieController::class, 'destroy']);
Route::get('sheets', [SheetController::class, 'index']);
Route::get('/admin/schedules', [ScheduleController::class, 'index']);
Route::get('/admin/schedules/{id}', [ScheduleController::class, 'show']);
Route::get('/admin/movies/{id}/schedules/create', [ScheduleController::class, 'create']);
Route::get('/admin/schedules/{scheduleId}/edit', [ScheduleController::class, 'edit']);
Route::patch('/admin/schedules/{scheduleId}/update', [ScheduleController::class, 'update']);
Route::delete('/admin/schedules/{scheduleId}/destroy', [ScheduleController::class, 'destroy']);
