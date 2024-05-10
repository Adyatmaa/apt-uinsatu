<?php

namespace App\Http\Controllers;

use App\Imports\ImportProdi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProdiController extends Controller
{
    public function insertProdi(Request $request)
    {
        Excel::import(new ImportProdi(), $request->file('file'));

        return redirect()->back();
    }
}
