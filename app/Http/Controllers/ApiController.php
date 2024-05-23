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
use App\Models\MJenjang;
use App\Models\MProdi;
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
                'message' => 'Terjadi kesalahan saat mengambil data tendik',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listFakultas()
    {
        $data = MFakultas::all();

        return new ApiResource(true, 'List Data Fakultas', $data);
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
                ->select('id_jabatan_tendik', DB::raw('count(*) as total'))
                ->groupBy('id_jabatan_tendik')
                ->get()
                ->map(function ($item) {
                    return [
                        'jabatan_tendik' => $item->jabatanTendik->jabatan_tendik,
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
                'message' => 'Terjadi kesalahan saat mengambil data tendik',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function dosen()
    {
        try {
            // Mengambil jumlah data berdasarkan jabatan dosen
            $counts = DtDosen::with('jabatanAkademik')
                ->select('id_jabatan_akademik_dosen', DB::raw('count(*) as total'))
                ->groupBy('id_jabatan_akademik_dosen')
                ->get()
                ->map(function ($item) {
                    return [
                        'jabatan_akademik_dosen' => $item->jabatanAkademik->jabatan_akademik_dosen,
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
    public function listMhsAsing(Request $request){
        $query = DetailMhsAsing::query();

        $data = $query->where($request->id_prodi);

        //return collection of posts as a resource
        // return new ApiResource(true, 'List Data Calon Mahasiswa', $data);

    }


}
