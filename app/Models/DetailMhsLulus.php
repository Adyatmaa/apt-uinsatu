<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMhsLulus extends Model
{
    use HasFactory;
    protected $table = 'detail_data_mhs_lulus';
    protected $primaryKey = 'id_detail_data_mhs_lulus';
    public $timestamps = false;
    protected $fillable = [
        'id_data_mhs_lulus',
        'id_prodi',
        'jml_lulusan',
        'rerata_ipk',
        'rerata_masa_studi',
    ];

    public function prodi()
    {
        return $this->belongsTo(MProdi::class, 'id_prodi');
    }

    public function dataMhsLulus()
    {
        return $this->belongsTo(DataMhsLulus::class, 'id_data_mhs_lulus', 'id_data_mhs_lulus');
    }
}
