<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

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

Auth::routes();

Route::get('/', [LibraryController::class, 'index']);
Route::get('/show/{id}', [LibraryController::class, 'show'])->name('show');
Route::get('/create', [LibraryController::class, 'create'])->name('create');
Route::post('/create/store', [LibraryController::class, 'store'])->name('store');
Route::get('/edit/{id}', [LibraryController::class, 'edit'])->name('edit');
Route::patch('edit/{id}/update', [LibraryController::class, 'update'])->name('update');