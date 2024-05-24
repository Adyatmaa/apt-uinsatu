<?php

namespace App\Http\Controllers;

use App\Imports\ImportMahasiswa;
use App\Models\DataCalonMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    function insertMahasiswa(Request $request)
    {
        $statusMahasiswa = $request->statusMahasiswa;
        $id_tahun = $request->id_tahun;
        $file = $request->file;
        //input nang model data calon seng isine tahun ambe bukti
        //id data calon -> parameter importMahasiswa

        Excel::import(new ImportMahasiswa($statusMahasiswa, $id_tahun, $file), $request->file('file'), $request->statusMahasiswa);

        return redirect()->back();
    }
}
