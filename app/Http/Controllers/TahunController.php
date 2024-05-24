<?php

namespace App\Http\Controllers;

use App\Models\DataCalonMahasiswa;
use App\Models\DataMahasiswaAktif;
use App\Models\DataMhsAsing;
use App\Models\DataMhsLulus;
use App\Models\DataMhsTugasAkhir;
use App\Models\MTahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function addTahun(Request $request)
    {
        $tahun = new MTahun();
        $tahun->tahun = $request->tahun;
        $tahun->is_ts = '2024';
        $tahun->save();
        
        return redirect()->back();
    }

    public function delTahun($id)
    {
        $tahun = MTahun::findOrFail($id);
        $tahun->delete();
        return redirect()->back();
    }
}
