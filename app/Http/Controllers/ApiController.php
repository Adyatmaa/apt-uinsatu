<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\DtDosen;
use App\Models\DTendik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function dosen()
    {
        //get all posts
        $data = DtDosen::all();

        //return collection of posts as a resource
        return new ApiResource(true, 'List Data Dosen', $data);
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
}
