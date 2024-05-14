<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCalonMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'data_calon_mahasiswa';
    protected $primarykey = 'id_data_calon_mahasiswa';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti'
    ];
}
