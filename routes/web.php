<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TendikController;
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

Route::post('adReg', [PageController::class, 'adReg'])->name('adReg');
Route::post('adLoggingIn', [PageController::class, 'adLoggingIn'])->name('adLoggingIn');

Route::get('logout', [PageController::class, 'logout'])->name('logout');
Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('register', [PageController::class, 'register'])->name('register');
Route::get('/', [PageController::class, 'login'])->name('login');
Route::get('input-prodi', [PageController::class, 'pageInputProdi'])->name('pageInputProdi');
Route::get('input-mahasiswa', [PageController::class, 'pageInputMahasiswa'])->name('pageInputMahasiswa');
Route::get('info-mahasiswa/{id_tahun}', [PageController::class, 'pageInfoMahasiswa'])->name('pageInfoMahasiswa');
Route::get('edit-mahasiswa/{id_tahun}', [PageController::class, 'pageEditMahasiswa'])->name('pageEditMahasiswa');
Route::get('add-mahasiswa/{id_tahun}', [PageController::class, 'pageAddMahasiswa'])->name('pageAddMahasiswa');

Route::get('input-tenaga-pendidikan', [PageController::class, 'pageInputTendik'])->name('pageInputTendik');
Route::get('input-dosen', [PageController::class, 'pageInputDosen'])->name('pageInputDosen');

Route::get('data-fakultas', [PageController::class, 'pageDataFakultas'])->name('pageDataFakultas');
Route::get('data-jenjang', [PageController::class, 'pageDataJenjang'])->name('pageDataJenjang');
Route::get('data-program-studi', [PageController::class, 'pageDataProdi'])->name('pageDataProdi');
Route::get('data-jabatan-akademik-dosen', [PageController::class, 'pageDataJbAkaDsn'])->name('pageDataJbAkaDsn');
Route::get('data-pendidikan-terakhir', [PageController::class, 'pageDataPendAkhir'])->name('pageDataPendAkhir');
Route::get('data-jabatan-tendik', [PageController::class, 'pageDataJbTendik'])->name('pageDataJbTendik');
Route::get('data-tendik', [PageController::class, 'pageDataTendik'])->name('pageDataTendik');
Route::get('data-dosen', [PageController::class, 'pageDataDosen'])->name('pageDataDosen');

Route::get('data-calon-mahasiswa', [PageController::class, 'pageDataCalonMhs'])->name('pageDataCalonMhs');
Route::get('data-mhs-aktif', [PageController::class, 'pageDataMhsAktif'])->name('pageDataMhsAktif');
Route::get('data-mhs-asing', [PageController::class, 'pageDataMhsAsing'])->name('pageDataMhsAsing');
Route::get('data-mhs-lulus', [PageController::class, 'pageDataMhsLulus'])->name('pageDataMhsLulus');
Route::get('data-mhs-tugas-akhir', [PageController::class, 'pageDataMhsTgsAkhir'])->name('pageDataMhsTgsAkhir');

Route::post('input-prodi', [ProdiController::class, 'insertProdi'])->name('prodi.insert');
Route::post('input-tendik', [TendikController::class, 'insertTendik'])->name('tendik.insert');
Route::post('input-dosen', [DosenController::class, 'insertDosen'])->name('dosen.insert');
Route::post('input-mahasiswa', [MahasiswaController::class, 'insertMahasiswa'])->name('mahasiswa.insert');

Route::post('tambah-tahun', [TahunController::class, 'addTahun'])->name('addTahun');
Route::delete('del-mahasiswa/{id_tahun}', [TahunController::class, 'delTahun'])->name('delTahun');