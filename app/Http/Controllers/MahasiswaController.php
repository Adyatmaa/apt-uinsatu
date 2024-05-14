<?php

namespace App\Http\Controllers;

use App\Imports\ImportMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    function insertMahasiswa(Request $request)
    {
        $statusMahasiswa = $request->statusMahasiswa;
        Excel::import(new ImportMahasiswa($statusMahasiswa), $request->file('file'), $request->statusMahasiswa);

        return redirect()->back();
    }
}
