<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsLulus extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_lulus';
    protected $primaryKey = 'id_data_mhs_lulus';
    public $timestamps = false;
    protected $fillable = [
        'id_tahun',
        'bukti',
    ];
    public function tahun()
    {
        return $this->belongsTo(MTahun::class, 'id_tahun');
    }

    public function detailMhsLulus()
    {
        return $this->hasMany(DetailMhsLulus::class, 'id_data_mhs_lulus', 'id_data_mhs_lulus');
    }
}
