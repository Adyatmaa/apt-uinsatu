<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsLulus extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_lulus';
    protected $primarykey = 'id_data_mhs_lulus';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti',
    ];
}
