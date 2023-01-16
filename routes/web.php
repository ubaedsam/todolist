<?php

use App\Models\Pelajar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelajarController;

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

Route::get('pelajar', [PelajarController::class, 'index'])->name('pelajar');

Route::get('pelajar/create', [PelajarController::class, 'create'])->name('pelajar.create');

Route::post('pelajar/store', [PelajarController::class, 'store'])->name('pelajar.store');

Route::get('edit/{id}', [PelajarController::class, 'edit']);

Route::post('update/{id}', [PelajarController::class, 'update']);

Route::delete('delete/{id}', [PelajarController::class, 'destroy']);