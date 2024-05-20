<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\DtDosen;
use App\Models\DTendik;
use App\Models\MAkreditasi;
use App\Models\MFakultas;
use App\Models\MProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
