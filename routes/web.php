<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [PlayerController::class, 'index']);
Route::get('/home', [PlayerController::class, 'show']);
Route::get('/store', [PlayerController::class, 'index2']);
Route::post('/store', [PlayerController::class ,'create']);
Route::get('/update/{id}', [PlayerController::class, 'edit']);
Route::post('/update/{id}', [PlayerController::class, 'update']);
Route::delete('/delete/{id}', [PlayerController::class, 'destroy']);
