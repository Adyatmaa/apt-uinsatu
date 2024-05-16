<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTendik extends Model
{
    use HasFactory;
    protected $table = 'data_tendik';
    protected $primarykey = 'nip_nik_tendik';
    public $timestamps = false;
    protected $fillable = [
        'nip_nik_tendik',
        'nama_tendik',
        'id_jabatan_tendik',
        'bukti',
        'keterangan',
    ];

    public function jabatanTendik()
    {
        return $this->belongsTo(MJabatan_tendik::class, 'id_jabatan_tendik', 'id_jabatan_tendik');
    }
}
