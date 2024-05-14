<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMhsTugasAkhir extends Model
{
    use HasFactory;
    protected $table = 'detail_data_mhs_tugas_akhir';
    protected $primarykey = 'id_detail_data_mhs_tugas_akhir';
    public $timestamps = false;
    protected $fillable = [
        'id_data_mhs_tugas_akhir',
        'id_prodi',
        'jml_mhs_tugas_akhir',
    ];
}
