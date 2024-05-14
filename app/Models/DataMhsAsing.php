<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsAsing extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_asing';
    protected $primarykey = 'id_data_mhs_asing';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti',
    ];
}
