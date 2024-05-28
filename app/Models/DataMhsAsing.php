<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsAsing extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_asing';
    protected $primaryKey = 'id_data_mhs_asing';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti',
    ];

    public function tahun()
    {
        return $this->belongsTo(MTahun::class, 'id_tahun', 'id_tahun');
    }

    public function detailMhsAsing()
    {
        return $this->hasMany(DetailMhsAsing::class, 'id_data_mhs_asing', 'id_data_mhs_asing');
    }
}
