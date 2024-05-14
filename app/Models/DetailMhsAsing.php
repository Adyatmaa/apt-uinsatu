<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMhsAsing extends Model
{
    use HasFactory;
    protected $table = 'detail_data_mhs_asing';
    protected $primarykey = 'id_detail_data_mhs_asing';
    public $timestamps = false;
    protected $fillable = [
        'id_data_mhs_asing',
        'id_prodi',
        'jml_mhs_asing',
    ];
}
