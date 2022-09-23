<?php

use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AlumnadoController;
use App\Http\Controllers\ClaseController;


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
Route::resource('profesor',ProfesorController::class);
Route::resource('alumnado',AlumnadoController::class);
Route::resource('clase',ClaseController::class);



