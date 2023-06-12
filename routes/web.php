<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/home', [PlayerController::class, 'index'])->middleware('auth');
Route::get('/home', [PlayerController::class, 'show'])->middleware('auth');
Route::get('/store', [PlayerController::class, 'index2'])->middleware('isAdmin');
Route::post('/store', [PlayerController::class ,'create'])->middleware('isAdmin');
Route::get('/update/{id}', [PlayerController::class, 'edit'])->middleware('isAdmin');
Route::post('/update/{id}', [PlayerController::class, 'update'])->middleware('isAdmin');
Route::delete('/delete/{id}', [PlayerController::class, 'destroy'])->middleware('isAdmin');
