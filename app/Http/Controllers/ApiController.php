<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\DtDosen;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function dosen()
    {
        //get all posts
        $data = DtDosen::all();

        //return collection of posts as a resource
        return new ApiResource(true, 'List Data Dosen', $data);
    }
}
