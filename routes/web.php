<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\SalaAuthController;

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

//Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
//Route::resource('salas', SalaController::class);

Route::get('/salas', [SalaController::class, 'index'])->name('salas.index');
Route::get('/salas/login', [SalaController::class, 'login'])->name('salas.login');

Route::get('/sala/{uuid?}', [SalaController::class, 'show'])->name('salas.show');

Route::post('/salas/store', [SalaController::class, 'store'])->name('salas.store');
Route::post('/salas/find', [SalaController::class, 'find'])->name('salas.find');
