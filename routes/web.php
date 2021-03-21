<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
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

Route::get('servicio', [ServicioController::class,'index'])->name('servicio.index');
Route::get('servicio/{servicio}/create', [ServicioController::class,'create'])->name('servicio.create');
Route::post('servicio', [ServicioController::class,'store'])->name('servicio.store');
Route::get('servicio/{servicio}', [ServicioController::class,'show'])->name('servicio.show');
Route::get('servicio/{servicio}/edit', [ServicioController::class,'edit'])->name('servicio.edit');
Route::put('servicio/{servicio}', [ServicioController::class,'update'])->name('servicio.update');
Route::delete('servicio/{servicio}', [ServicioController::class,'destroy'])->name('servicio.destroy');

