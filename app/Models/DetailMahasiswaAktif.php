<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMahasiswaAktif extends Model
{
    use HasFactory;
    protected $table = 'detail_data_mhs_aktif';
    protected $primaryKey = 'id_detail_data_mhs_aktif';
    public $timestamps = false;
    protected $fillable = [
        'id_data_mhs_aktif',
        'id_prodi',
        'jml_mhs_aktif',
        'jml_mhs_transfer',
    ];

    public function prodi()
    {
        return $this->belongsTo(MProdi::class, 'id_prodi');
    }

    public function dataMhsAktif()
    {
        return $this->belongsTo(DataMahasiswaAktif::class, 'id_data_mhs_aktif', 'id_data_mhs_aktif');
    }
}
