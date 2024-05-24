<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTahun extends Model
{
    use HasFactory;
    protected $table = 'm_tahun';
    protected $primaryKey = 'id_tahun';
    public $timestamps = false;
    protected $fillable = [
        'tahun',
        'is_ts'
    ];

    public function dataCalonMhs()
    {
        return $this->belongsTo(DataCalonMahasiswa::class, 'id_tahun', 'id_tahun');
    }
    
    public function dataMhsAktif()
    {
        return $this->belongsTo(DataMahasiswaAktif::class, 'id_tahun', 'id_tahun');
    }
    
    public function dataMhsAsing()
    {
        return $this->belongsTo(DataMhsAsing::class, 'id_tahun', 'id_tahun');
    }

    public function dataMhsLulus()
    {
        return $this->belongsTo(DataMhsLulus::class, 'id_tahun', 'id_tahun');
    }
    
    public function dataMhsAkhir()
    {
        return $this->belongsTo(DataMhsTugasAkhir::class, 'id_tahun', 'id_tahun');
    }
}
