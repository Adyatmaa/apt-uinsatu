<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\DataCalonMahasiswa;
use App\Models\DetailCalonMahasiswa;
use App\Models\DetailMhsAsing;
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

            //     $count = MProdi::select('id_jenjang', 'id_akreditasi', DB::raw('count(*) as jml'))
            //         ->groupBy('id_jenjang', 'id_akreditasi')
            //         ->with(['jenjang', 'akreditasi'])
            //         ->get()
            //         ->groupBy('id_jenjang')
            //         ->map(
            //             function ($group) {
            //                 $jenjang = $group->first()->jenjang->nama_jenjang;
            //                 $akreditasiCount = $group->mapWithKeys(
            //                     function ($item) {
            //                         return [
            //                             $item->akreditasi->akreditasi => $item->jml ?? 0
            //                         ];
            //                     }
            //                 );
            //                 return [
            //                     'jenjang' => $jenjang,
            //                     'akreditasi' => $akreditasiCount,
            //                     'jumlah' => $group->sum('jml')
            //                 ];
            //             }
            //         );

            //     $totalUnggul = $count->sum(function ($group) {
            //         return $group['akreditasi']['Unggul'] ?? 0;
            //     });
            //     $totalA = $count->sum(function ($group) {
            //         return $group['akreditasi']['A'] ?? 0;
            //     });
            //     $totalB = $count->sum(function ($group) {
            //         return $group['akreditasi']['B'] ?? 0;
            //     });
            //     $totalBS = $count->sum(function ($group) {
            //         return $group['akreditasi']['Baik Sekali'] ?? 0;
            //     });
            //     $totalBk = $count->sum(function ($group) {
            //         return $group['akreditasi']['Baik'] ?? 0;
            //     });

            //     $totalData = $count->sum('jumlah');

            //     return response()->json([
            //         'success' => true,
            //         'data' => $count->values(),
            //         'total_data' => $totalData,
            //         'total_akreditasi_unggul' => $totalUnggul,
            //         'total_akreditasi_a' => $totalA,
            //         'total_akreditasi_b' => $totalB,
            //         'total_akreditasi_baik_sekali' => $totalBS,
            //         'total_akreditasi_baik' => $totalBk,
            //     ], 200);
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

    public function listProdi()
    {
        $data = MProdi::all();
        return new ApiResource(true, 'List Data Program Studi', $data);
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



    public function listcalonmhs()
    {

        $data = DetailCalonMahasiswa::all();

        //return collection of posts as a resource
        return new ApiResource(true, 'List Data Calon Mahasiswa', $data);
    }

    public function listCalonMhsByProdi(Request $request)
    {
        $query = DetailCalonMahasiswa::query();
        $prodi = MProdi::find($request->id_prodi);
        $jenjang = MJenjang::find($request->id_jenjang);

        try {
            // filter prodi
            if ($request->has('id_prodi')) {
                $query->where('id_prodi', $request->id_prodi);
            }

            // filter jenjang
            if ($request->has('id_jenjang')) {
                $query->whereHas('prodi', function ($q) use ($request) {
                    $q->where('id_jenjang', $request->id_jenjang);
                });
            }

            $dataCalon = $query->with(['prodi.jenjang'])->get();
            //     ->map(function ($item) {
            //         return [
            //             'daya_tampung' => $item->daya_tampung,
            //             'pendaftar' => $item->pendaftar,
            //             'lulus_seleksi' => $item->lulus_seleksi,
            //         ];
            //     }
            // );
            // dd($dataCalon);

            if (count($dataCalon) < 1) {
                return response()->json([
                    'success' => true,
                    'message' => 'Prodi ' . $prodi->nama_prodi . ' belum memiliki program ' . $jenjang->nama_jenjang

                ], 200);
            }
            return response()->json([
                'success' => true,
                'data' => $dataCalon

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => true,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()

            ], 500);
        }
    }
    public function listMhsAsing(Request $request)
    {
        $query = DetailMhsAsing::query();

        $data = $query->where($request->id_prodi);

        //return collection of posts as a resource
        // return new ApiResource(true, 'List Data Calon Mahasiswa', $data);

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

            $pendidikanCounts = $group->groupBy('id_pendidikan_terakhir')->mapWithKeys(function ($items, $key) {
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
}
