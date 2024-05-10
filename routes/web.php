<?php

use App\Http\Controllers\ProdiController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('input-prodi', [PageController::class, 'pageInputProdi'])->name('pageInputProdi');
Route::get('input-mahasiswa', [PageController::class, 'pageInputMahasiswa'])->name('pageInputMahasiswa');
Route::get('input-tenaga-pendidikan', [PageController::class, 'pageInputTendik'])->name('pageInputTendik');

Route::get('data-fakultas', [PageController::class, 'pageDataFakultas'])->name('pageDataFakultas');
Route::get('data-program-studi', [PageController::class, 'pageDataProdi'])->name('pageDataProdi');

Route::post('input-prodi', [ProdiController::class, 'insertProdi'])->name('prodi.insert');
