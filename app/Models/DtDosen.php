<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DtDosen extends Model
{
    use HasFactory;
    protected $table = 'data_dosen';
    protected $primarykey = 'nip_nik_dosen';
    public $timestamps = false;
    protected $fillable = [
        'nip_nik_dosen',
        'nama_dosen',
        'id_prodi',
        'id_jabatan_akademik_dosen',
        'id_pendidikan_terakhir',
        'is_sertifikasi',
        'is_tetap',
    ];
}
