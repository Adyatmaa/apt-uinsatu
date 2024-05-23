<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProdi extends Model
{
    use HasFactory;
    protected $table = 'm_prodi';
    protected $primaryKey = 'id_prodi';
    public $timestamps = false;
    protected $fillable = [
        'nama_prodi',
        'id_jenjang',
        'id_fakultas',
        'sk_pendirian',
        'id_akreditasi',
        'bukti_akreditasi'
    ];

    public function jenjang()
    {
        return $this->belongsTo(MJenjang::class, 'id_jenjang');
    }

    public function fakultas()
    {
        return $this->belongsTo(MFakultas::class, 'id_fakultas');
    }

    public function akreditasi()
    {
        return $this->belongsTo(MAkreditasi::class, 'id_akreditasi');
    }

    public function dosen()
    {
        return $this->hasMany(DtDosen::class, 'id_prodi');
    }
    public function mhsCalon()
    {
        return $this->hasMany(DetailCalonMahasiswa::class, 'id_prodi');
    }
    public function mhsAsing(){
        return $this->hasMany(DetailMhsAsing::class,'id_prodi');
    }
}
