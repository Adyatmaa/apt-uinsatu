<?php

namespace App\Http\Controllers;

use App\Imports\ImportTendik;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TendikController extends Controller
{
    //
    public function insertTendik(Request $request)
    {
        Excel::import(new ImportTendik(), $request->file('file'));

        return redirect()->back();
    }
}
