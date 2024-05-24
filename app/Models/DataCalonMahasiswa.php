<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCalonMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'data_calon_mahasiswa';
    protected $primaryKey = 'id_data_calon_mahasiswa';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti'
    ];

    public function tahun()
    {
        return $this->belongsTo(MTahun::class, 'id_tahun', 'id_tahun');
    }

    public function detailCalonMhs()
    {
        return $this->hasMany(DetailCalonMahasiswa::class, 'id_data_calon_mahasiswa', 'id_data_calon_mahasiswa');
    }
}
