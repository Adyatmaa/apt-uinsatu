<?php

namespace App\Http\Controllers;

use App\Imports\ImportDosen;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    public function insertDosen(Request $request)
    {
        Excel::import(new ImportDosen, $request->file('file'));

        return redirect()->back();
    }
}
