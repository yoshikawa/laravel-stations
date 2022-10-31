<?php

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ReservationController;
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
Route::prefix('/movies')->group(function () {
    Route::get('/', [MovieController::class, 'index']);
    Route::get('/{id}', [MovieController::class, 'show']);
    Route::get('/{movie_id}/schedules/{schedule_id}/sheets', [ReservationController::class, 'index']);
    Route::get('/{movie_id}/schedules/{schedule_id}/reservations/create', [ReservationController::class, 'create']);
});

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

Route::prefix('/reservations')->group(function () {
    Route::post('/store', [ReservationController::class, 'store']);
});

Route::prefix('/admin/schedules')->group(function () {
    Route::get('/', [AdminScheduleController::class, 'index']);
    Route::get('/{id}', [AdminScheduleController::class, 'show']);
    Route::get('/{id}/edit', [AdminScheduleController::class, 'edit']);
    Route::patch('/{id}/update', [AdminScheduleController::class, 'update']);
    Route::delete('/{id}/destroy', [AdminScheduleController::class, 'destroy']);
});


Route::prefix('admin/reservations')->group(function () {
    Route::get('/', [AdminReservationController::class, 'index']);
    Route::get('/create', [AdminReservationController::class, 'create']);
    Route::post('/store', [AdminReservationController::class, 'store']);
    Route::get('/{id}/edit', [AdminReservationController::class, 'edit']);
    Route::patch('/{id}', [AdminReservationController::class, 'update']);
    Route::delete('/{id}', [AdminReservationController::class, 'destroy']);

    Route::fallback(function () {
        return abort(404);
    });
});
