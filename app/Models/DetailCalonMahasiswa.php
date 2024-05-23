<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCalonMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'detail_data_calon_mahasiswa';
    protected $primarykey = 'id_detail_data_calon_mahasiswa';
    public $timestamps = false;
    protected $fillable = [
        'id_data_calon_mahasiswa',
        'id_prodi',
        'daya_tampung',
        'pendaftar',
        'lulus_seleksi',
        'mhs_registrasi',
        'mhs_transfer',
    ];

    public function prodi()
    {
        return $this->belongsTo(MProdi::class, 'id_prodi');
    }
}
