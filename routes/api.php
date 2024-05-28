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
Route::get('list-akreditasi', [ApiController::class, 'akreditasi']);
Route::get('akreditasi', [ApiController::class, 'akreditasiByJenjang']);
Route::get('list-tendik', [ApiController::class, 'listTendik']);
Route::get('list-fakultas', [ApiController::class, 'listFakultas']);

Route::get('list-jenjang', [ApiController::class, 'listJenjang']);
Route::get('list-prodi/{id}', [ApiController::class, 'listProdi']);

Route::get('calon-mhs', [ApiController::class, 'listcalonmhs']);
Route::get('calon-mhs', [ApiController::class, 'listCalonMhsByProdi']);

Route::get('mhs-asing', [ApiController::class, 'mhsAsing']);
Route::get('mhs-tugas-akhir', [ApiController::class, 'mhsTugasAkhir']);
Route::get('mhs-aktif', [ApiController::class, 'listMhsAktifByProdi']);

Route::get('mhs-lulus', [ApiController::class, 'listMhsLulusByProdi']);

Route::get('mhs-asing', [ApiController::class, 'listMhsAsing']);

Route::get('dosen-homebase', [ApiController::class, 'dosenHomebase']);
Route::get('dosen-jabatan-akademik', [ApiController::class, 'dosenJabatanAkademik']);
Route::get('dosen-pendidikan-akhir', [ApiController::class, 'dosenPendidikanAkhir']);
Route::get('dosen-status-sertifikasi', [ApiController::class, 'dosenBersertifikat']);
Route::get('dosen-tidak-tetap', [ApiController::class, 'dosenTidakTetap']);
