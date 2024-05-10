<?php

namespace App\Http\Controllers;

use App\Models\MFakultas;
use App\Models\MProdi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function dashboard()
    {
        return view('dashboard');
    }

    function pageInputProdi()
    {
        $faculty = MFakultas::all();
        return view('inputProdi', compact('faculty'));
    }

    function pageInputMahasiswa()
    {
        return view('inputMahasiswa');
    }

    function pageInputTendik()
    {
        return view('inputTendik');
    }

    function pageDataFakultas()
    {
        $faculty = MFakultas::all();
        return view('dataFakultas', compact('faculty'));
    }

    function pageDataProdi()
    {
        $prodi = MProdi::with(['jenjang', 'fakultas', 'akreditasi'])->get();
        // dd($prodi);
        return view('dataProdi', compact('prodi'));
    }
}
