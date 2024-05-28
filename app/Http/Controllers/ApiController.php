<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\DataCalonMahasiswa;
use App\Models\DetailCalonMahasiswa;
use App\Models\DetailMhsAsing;
use App\Models\DetailMhsTugasAkhir;
use App\Models\DtDosen;
use App\Models\DTendik;
use App\Models\MAkreditasi;
use App\Models\MFakultas;
use App\Models\MJabatan_aka_dsn;
use App\Models\MJenjang;
use App\Models\MProdi;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ApiController extends Controller
{
    public function listDosen()
    {
        //get all posts
        $data = DtDosen::all();

        //return collection of posts as a resource
        return new ApiResource(true, 'List Data Dosen', $data);
    }

    public function listTendik()
    {
        $data = DTendik::all();

        return new ApiResource(true, 'List Data Tenaga Didik', $data);
    }

    public function akreditasi()
    {
        try {
            // Mengambil jumlah data berdasarkan akreditasi
            $counts = MProdi::with('akreditasi')
                ->select('id_akreditasi', DB::raw('count(*) as total'))
                ->groupBy('id_akreditasi')
                ->get()
                ->map(function ($item) {
                    return [
                        'id_akreditasi' => $item->akreditasi->id_akreditasi,
                        'akreditasi' => $item->akreditasi->akreditasi,
                        'total' => $item->total
                    ];
                });

            // Mengembalikan data dalam format JSON
            return response()->json([
                'success' => true,
                'data' => $counts
            ], 200);
        } catch (\Exception $e) {
            // Mengembalikan pesan error dalam format JSON dengan kode status 500 (Internal Server Error)
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function akreditasiByJenjang()
    {
        try {
            $allAkreditasi = ['Unggul', 'A', 'B', 'Baik Sekali', 'Baik'];

            $prodiData = MProdi::with(['jenjang', 'akreditasi'])
                ->select('id_jenjang', 'id_akreditasi', DB::raw('count(*) as jml'))
                ->groupBy('id_jenjang', 'id_akreditasi')
                ->get();

            $groupedData = $prodiData->groupBy('id_jenjang')->map(function ($group) use ($allAkreditasi) {
                $jenjang = $group->first()->jenjang->nama_jenjang;

                $akreditasiCount = collect($allAkreditasi)->mapWithKeys(function ($akreditasi) use ($group) {
                    $item = $group->firstWhere('akreditasi.akreditasi', $akreditasi);
                    return [
                        $akreditasi => $item->jml ?? 0
                    ];
                });

                return [
                    'jenjang' => $jenjang,
                    'akreditasi' => $akreditasiCount,
                    'jumlah' => $group->sum('jml')
                ];
            });

            $totalUnggul = $groupedData->sum(function ($group) {
                return $group['akreditasi']['Unggul'] ?? 0;
            });
            $totalA = $groupedData->sum(function ($group) {
                return $group['akreditasi']['A'] ?? 0;
            });
            $totalB = $groupedData->sum(function ($group) {
                return $group['akreditasi']['B'] ?? 0;
            });
            $totalBS = $groupedData->sum(function ($group) {
                return $group['akreditasi']['Baik Sekali'] ?? 0;
            });
            $totalBk = $groupedData->sum(function ($group) {
                return $group['akreditasi']['Baik'] ?? 0;
            });

            $totalData = $groupedData->sum('jumlah');

            return response()->json([
                'success' => true,
                'data' => $groupedData->values(),
                'total_data' => $totalData,
                'total_akreditasi_unggul' => $totalUnggul,
                'total_akreditasi_a' => $totalA,
                'total_akreditasi_b' => $totalB,
                'total_akreditasi_baik_sekali' => $totalBS,
                'total_akreditasi_baik' => $totalBk,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function listFakultas()
    {
        $data = MFakultas::all();

        return new ApiResource(true, 'List Data Fakultas', $data);
    }

    public function listJenjang()
    {
        $data = MJenjang::all();
        return new ApiResource(true, 'List Jenjang', $data);
    }

    public function listProdi($id)
    {
        $data = MProdi::where('id_jenjang', $id)->get();
        return new ApiResource(true, 'List Data Program Studi Berdasarkan Jenjang', $data);
    }

    public function tendik()
    {
        try {
            // Mengambil jumlah data berdasarkan jabatan tendik
            $counts = DTendik::with('jabatanTendik')
                ->select('id_jabatan_tendik', DB::raw('count(*) as jumlah'))
                ->groupBy('id_jabatan_tendik')
                ->get()
                ->map(function ($item) {
                    return [
                        'jabatan_tendik' => $item->jabatanTendik->jabatan_tendik,
                        'jumlah' => $item->jumlah
                    ];
                });

            $totalData = $counts->sum('jumlah');

            // Mengembalikan data dalam format JSON
            return response()->json([
                'success' => true,
                'data' => $counts,
                'total_data' => $totalData
            ], 200);
        } catch (\Exception $e) {
            // Mengembalikan pesan error dalam format JSON dengan kode status 500 (Internal Server Error)
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data tendik',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listCalonMhsByProdi(Request $request)
    {

        try {
            // filter prodi
            if ($request->has('id_prodi')) {
                // $data = $queryDetail->with('prodi').with('dataCalonMhs')->where('id_prodi', $request->id_prodi)->get();
                $dataCalon = DB::table('detail_data_calon_mahasiswa')
                    ->select('m_tahun.tahun as tahun', 'detail_data_calon_mahasiswa.*')
                    ->leftJoin('data_calon_mahasiswa', 'data_calon_mahasiswa.id_data_calon_mahasiswa', '=', 'detail_data_calon_mahasiswa.id_data_calon_mahasiswa')
                    ->leftJoin('m_tahun', 'm_tahun.id_tahun', '=', 'data_calon_mahasiswa.id_tahun')
                    ->where('detail_data_calon_mahasiswa.id_prodi', '=', $request->id_prodi)
                    ->get()
                    ->map(function ($mhs) {
                        return [
                            'tahun' => $mhs->tahun,
                            'daya_tampung' => $mhs->daya_tampung,
                            'pendaftar' => $mhs->pendaftar,
                            'lulus_seleksi' => $mhs->lulus_seleksi,

                        ];
                    });
            }

            return response()->json([
                'success' => true,
                'data' => $dataCalon

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()

            ], 500);
        }
    }

    public function listMhsAktifByProdi(Request $request)
    {
        try {
            if ($request->has('id_prodi')) {
                $mhsAktif = DB::table('detail_data_mhs_aktif')
                    ->select('m_tahun.tahun as tahun', 'detail_data_mhs_aktif.*')
                    ->leftJoin('data_mhs_aktif', 'data_mhs_aktif.id_data_mhs_aktif', '=', 'detail_data_mhs_aktif.id_data_mhs_aktif')
                    ->leftJoin('m_tahun', 'm_tahun.id_tahun', '=', 'data_mhs_aktif.id_tahun')
                    ->where('detail_data_mhs_aktif.id_prodi', $request->id_prodi)
                    ->get();
            }
            if ($mhsAktif->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data masih kosong!'

                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $mhsAktif

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()

            ], 500);
        }

    }
    
    public function listMhsLulusByProdi(Request $request)
    {
        try {
            if ($request->has('id_prodi')) {
                $mhsLulus = DB::table('detail_data_mhs_lulus')
                    ->select('m_tahun.tahun as tahun', 'detail_data_mhs_lulus.*')
                    ->leftJoin('data_mhs_lulus', 'data_mhs_lulus.id_data_mhs_lulus', '=', 'detail_data_mhs_lulus.id_data_mhs_lulus')
                    ->leftJoin('m_tahun', 'm_tahun.id_tahun', '=', 'data_mhs_lulus.id_tahun')
                    ->where('detail_data_mhs_lulus.id_prodi', $request->id_prodi)
                    ->get();
            }
            if ($mhsLulus->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data masih kosong!'

                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $mhsLulus

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()

            ], 500);
        }

    }
    
    public function listMhsAsingByProdi(Request $request)
    {
        try {
            if ($request->has('id_prodi')) {
                $mhsAsing = DB::table('detail_data_mhs_asing')
                    ->select('m_tahun.tahun as tahun', 'detail_data_mhs_asing.*')
                    ->leftJoin('data_mhs_asing', 'data_mhs_asing.id_data_mhs_asing', '=', 'detail_data_mhs_asing.id_data_mhs_asing')
                    ->leftJoin('m_tahun', 'm_tahun.id_tahun', '=', 'data_mhs_asing.id_tahun')
                    ->where('detail_data_mhs_asing.id_prodi', $request->id_prodi)
                    ->get();
            }
            if ($mhsAsing->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data masih kosong!'

                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $mhsAsing

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()

            ], 500);
        }

    }
    
    public function listMhsAkhirByProdi(Request $request)
    {
        try {
            if ($request->has('id_prodi')) {
                $mhsAkhir = DB::table('detail_data_mhs_tugas_akhir')
                    ->select('m_tahun.tahun as tahun', 'detail_data_mhs_tugas_akhir.*')
                    ->leftJoin('data_mhs_tugas_akhir', 'data_mhs_tugas_akhir.id_data_mhs_tugas_akhir', '=', 'detail_data_mhs_tugas_akhir.id_data_mhs_tugas_akhir')
                    ->leftJoin('m_tahun', 'm_tahun.id_tahun', '=', 'data_mhs_tugas_akhir.id_tahun')
                    ->where('detail_data_mhs_tugas_akhir.id_prodi', $request->id_prodi)
                    ->get();
            }
            if ($mhsAkhir->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data masih kosong!'

                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $mhsAkhir

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()

            ], 500);
        }

    }
    

    public function dosenJabatanAkademik()
    {
        $counts = DtDosen::select('id_jabatan_akademik_dosen', 'id_pendidikan_terakhir', DB::raw('count(*) as jumlah'))
            ->groupBy('id_jabatan_akademik_dosen', 'id_pendidikan_terakhir')
            ->with(['jabatanAkademik', 'pendidikanTerakhir'])
            ->get()
            ->groupBy('id_jabatan_akademik_dosen')
            ->map(function ($group) {
                $jabatanAkademik = $group->first()->jabatanAkademik->jabatan_akademik_dosen;
                $pendidikanCounts = $group->mapWithKeys(function ($item) {
                    return [$item->pendidikanTerakhir->pendidikan_terakhir => $item->jumlah];
                });

                return [
                    'jabatan_akademik' => $jabatanAkademik,
                    'pendidikan_terakhir' => $pendidikanCounts,
                    'jumlah' => $group->sum('jumlah')
                ];
            });

        // Menghitung total dosen berdasarkan pendidikan terakhir
        $totalS1 = $counts->sum(function ($group) {
            return $group['pendidikan_terakhir']['S1'] ?? 0;
        });
        $totalS2 = $counts->sum(function ($group) {
            return $group['pendidikan_terakhir']['S2'] ?? 0;
        });
        $totalS3 = $counts->sum(function ($group) {
            return $group['pendidikan_terakhir']['S3'] ?? 0;
        });

        $totalData = $counts->sum('jumlah');

        return response()->json([
            'success' => true,
            'data' => $counts->values(),
            'total_data' => $totalData,
            'total_data_S1' => $totalS1,
            'total_data_S2' => $totalS2,
            'total_data_S3' => $totalS3,
        ], 200);
    }

    public function dosenHomebase()
    {
        // Mengambil semua dosen beserta prodi dan fakultasnya
        $dosen = DtDosen::with('prodi.fakultas')->get();

        // Mengelompokkan dosen berdasarkan fakultas dan menghitung jumlah dosen di setiap fakultas
        $counts = $dosen->groupBy('prodi.fakultas.nama_fakultas')->map(function ($group) {
            return [
                'nama_fakultas' => $group->first()->prodi->fakultas->nama_fakultas,
                'jumlah' => $group->count()
            ];
        })->values();

        $totalData = $counts->sum('jumlah');

        return response()->json([
            'success' => true,
            'data' => $counts,
            'total_data' => $totalData
        ], 200);
    }

    public function dosenPendidikanAkhir()
    {
        // Mengambil data dosen beserta relasi prodi dan fakultasnya
        $dosen = DtDosen::with(['prodi.fakultas', 'pendidikanTerakhir'])
            ->get()
            ->groupBy('prodi.fakultas.id_fakultas');

        $counts = $dosen->map(function ($group) {
            $fakultas = $group->first()->prodi->fakultas->nama_fakultas;

            $pendidikanCounts = $group->groupBy('id_pendidikan_terakhir')
            ->mapWithKeys(function ($items, $key) {
                $pendidikan = $items->first()->pendidikanTerakhir->pendidikan_terakhir;
                return [$pendidikan => $items->count()];
            });

            return [
                'nama_fakultas' => $fakultas,
                'pendidikan_terakhir' => $pendidikanCounts,
                'jumlah' => $group->count()
            ];
        })->values();

        $totalS1 = $counts->sum(function ($group) {
            return $group['pendidikan_terakhir']['S1'] ?? 0;
        });
        $totalS2 = $counts->sum(function ($group) {
            return $group['pendidikan_terakhir']['S2'] ?? 0;
        });
        $totalS3 = $counts->sum(function ($group) {
            return $group['pendidikan_terakhir']['S3'] ?? 0;
        });

        $totalData = $counts->sum('jumlah');

        return response()->json([
            'success' => true,
            'data' => $counts,
            'total_data' => $totalData,
            'total_data_S1' => $totalS1,
            'total_data_S2' => $totalS2,
            'total_data_S3' => $totalS3,
        ], 200);
    }

    public function dosenBersertifikat()
    {
        // Mengambil semua dosen beserta prodi dan fakultasnya
        $dosen = DtDosen::with('prodi.fakultas')->get();

        // Mengelompokkan dosen berdasarkan fakultas dan menghitung jumlah dosen di setiap fakultas
        $counts = $dosen->groupBy('prodi.fakultas.nama_fakultas')->map(function ($group) {
            $jumlahSertifikasi = $group->where('is_sertifikasi', 1)->count();
            return [
                'nama_fakultas' => $group->first()->prodi->fakultas->nama_fakultas,
                'jumlah_dosen' => $group->count(),
                'jumlah_sertifikasi' => $jumlahSertifikasi
            ];
        })->values();

        $totalDosen = $counts->sum('jumlah_dosen');
        $totalDosenSertifikasi = $counts->sum('jumlah_sertifikasi');

        return response()->json([
            'success' => true,
            'data' => $counts,
            'total_dosen' => $totalDosen,
            'total_dosen_sertifikasi' => $totalDosenSertifikasi
        ], 200);
    }

    public function dosenTidakTetap()
    {
        $dosenTetapJabatan = DtDosen::where('is_tetap', false)
            ->select('id_jabatan_akademik_dosen', 'id_pendidikan_terakhir', DB::raw('count(*) as jumlah'))
            ->groupBy('id_jabatan_akademik_dosen', 'id_pendidikan_terakhir')
            ->with(['jabatanAkademik', 'pendidikanTerakhir'])
            ->get()
            ->groupBy('id_jabatan_akademik_dosen')
            ->map(function ($group) {
                $jabatanAkademik = $group->first()->jabatanAkademik->jabatan_akademik_dosen;
                $pendidikanCounts = $group->mapWithKeys(function ($item) {
                    return [$item->pendidikanTerakhir->pendidikan_terakhir => $item->jumlah];
                });

                return [
                    'jabatan_akademik' => $jabatanAkademik,
                    'pendidikan_terakhir' => $pendidikanCounts,
                    'jumlah' => $group->sum('jumlah')
                ];
            })->values();

        $dosen = DtDosen::with('prodi.fakultas')->get();

        $dosenTetapFakultas = $dosen->groupBy('prodi.fakultas.nama_fakultas')->map(function ($group) {
            $jumlahDosenTetap = $group->where('is_tetap', false)->count();
            return [
                'nama_fakultas' => $group->first()->prodi->fakultas->nama_fakultas,
                'jumlah_dosen_tetap' => $jumlahDosenTetap,
            ];
        })->values();

        $totalS1 = $dosenTetapJabatan->sum(function ($group) {
            return $group['pendidikan_terakhir']['S1'] ?? 0;
        });
        $totalS2 = $dosenTetapJabatan->sum(function ($group) {
            return $group['pendidikan_terakhir']['S2'] ?? 0;
        });
        $totalS3 = $dosenTetapJabatan->sum(function ($group) {
            return $group['pendidikan_terakhir']['S3'] ?? 0;
        });

        $totalDosenTetapFakultas = $dosenTetapFakultas->sum('jumlah_dosen_tetap');

        return response()->json([
            'success' => true,
            'fakultas' => $dosenTetapFakultas,
            'total_dosen_tetap_fakultas' => $totalDosenTetapFakultas,
            'jabatan_akademik' => $dosenTetapJabatan,
            'total_data_S1' => $totalS1,
            'total_data_S2' => $totalS2,
            'total_data_S3' => $totalS3,
        ], 200);
    }
    
    public function mhsTugasAkhir()
    {
        $a = DetailMhsTugasAkhir::with('prodi.fakultas', 'dataMhsTugasAkhir.tahun')
            ->get()
            ->groupBy('id_data_mhs_tugas_akhir');

        $mhs = $a->map(function($group) {
            $data = $group->first()->dataMhsTugasAkhir->tahun->tahun;

            $fakultasCount = $group->groupBy('prodi.fakultas.id_fakultas')
            ->mapWithKeys(function ($items, $key) {
                $fakultas = $items->first()->prodi->fakultas->nama_fakultas;
                return [
                    $fakultas => $items->sum('jml_mhs_tugas_akhir'),
                ];
            });

            return [
                'tahun' => $data,
                'fakultas' => $fakultasCount,
                'jumlah' => $fakultasCount->sum()
            ];
        })->values();

        $sumall = $mhs->sum('jumlah');

        return response()->json([
            'success' => true,
            'data' => $mhs,
            'total' => $sumall,
            // 'sum' => $sum,
        ], 200);
    }

    public function mhsAsing()
    {
        $a = DetailMhsAsing::with('prodi.fakultas', 'dataMhsAsing.tahun')
            ->get()
            ->groupBy('id_data_mhs_asing');

        $mhs = $a->map(function($group) {
            $data = $group->first()->dataMhsAsing->tahun->tahun;

            $fakultasCount = $group->groupBy('prodi.fakultas.id_fakultas')
            ->mapWithKeys(function ($items, $key) {
                $fakultas = $items->first()->prodi->fakultas->nama_fakultas;
                return [
                    $fakultas => $items->sum('jml_mhs_asing'),
                ];
            });

            return [
                'tahun' => $data,
                'fakultas' => $fakultasCount,
                'jumlah' => $fakultasCount->sum()
            ];
        })->values();

        $sumall = $mhs->sum('jumlah');

        return response()->json([
            'success' => true,
            'data' => $mhs,
            'total' => $sumall,
            // 'sum' => $sum,
        ], 200);
    }
}
