<?php

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminScheduleController;
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
Route::get('sheets', [SheetController::class, 'index']);

Route::prefix('/admin/movies')->group(function () {
    Route::get('/', [AdminMovieController::class, 'index']);
    Route::post('/search', [AdminMovieController::class, '']);
    Route::get('/create', [AdminMovieController::class, 'create']);
    Route::post('/store', [AdminMovieController::class, 'store']);
    Route::get('/{id}/edit', [AdminMovieController::class, 'edit']);
    Route::patch('/{id}/update', [AdminMovieController::class, 'update']);
    Route::delete('/{id}/destroy', [AdminMovieController::class, 'destroy']);

    Route::get('/{id}', [AdminMovieController::class, 'show']);
    Route::get('/{id}/schedules/create', [AdminScheduleController::class, 'create']);
    Route::post('/{id}/schedules/store', [AdminScheduleController::class, 'store']);

    Route::fallback(function () {
        return abort(404);
    });
});

Route::prefix('/admin/schedules')->group(function () {
    Route::get('/', [AdminScheduleController::class, 'index']);
    Route::get('/{id}', [AdminScheduleController::class, 'show']);
    Route::get('/{id}/edit', [AdminScheduleController::class, 'edit']);
    Route::patch('/{id}/update', [AdminScheduleController::class, 'update']);
    Route::delete('/{id}/destroy', [AdminScheduleController::class, 'destroy']);
});
