<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswaAktif extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_aktif';
    protected $primaryKey = 'id_data_mhs_aktif';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti',
    ];
    
    public function tahun()
    {
        return $this->belongsTo(MTahun::class, 'id_tahun');
    }

    public function detailMhsAktif()
    {
        return $this->hasMany(DetailMahasiswaAktif::class, 'id_data_mhs_aktif');
    }
}
