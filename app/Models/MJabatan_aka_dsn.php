<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJabatan_aka_dsn extends Model
{
    use HasFactory;
    protected $table = 'm_jabatan_akademik_dosen';
    protected $pirmarykey = 'id_jabatan_akademik_dosen';
    public $timestamps = false;
    protected $fillable = [
        'jabatan_akademik_dosen',
    ];
}
