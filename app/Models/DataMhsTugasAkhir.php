<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsTugasAkhir extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_tugas_akhir';
    protected $primaryKey = 'id_data_mhs_tugas_akhir';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti',
    ];

    public function tahun()
    {
        return $this->belongsTo(MTahun::class, 'id_tahun');
    }

    public function detailMhsAkhir()
    {
        return $this->hasMany(DetailMhsTugasAkhir::class, 'id_data_mhs_tugas_akhir', 'id_data_mhs_tugas_akhir');
    }
}
