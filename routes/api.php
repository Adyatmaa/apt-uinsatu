<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('dosen', [ApiController::class, 'dosen']);
Route::get('tendik', [ApiController::class, 'tendik']);
Route::get('list-dosen', [ApiController::class, 'listDosen']);
Route::get('list-tendik', [ApiController::class, 'listTendik']);
Route::get('list-akre', [ApiController::class, 'listAkre']);
Route::get('list-fakultas', [ApiController::class, 'listFakultas']);
Route::get('list-prodi', [ApiController::class, 'listProdi']);
