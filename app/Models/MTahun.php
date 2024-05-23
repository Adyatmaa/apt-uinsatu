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

    public function calonMhs()
    {
        return $this->belongsTo(DataCalonMahasiswa::class, 'id_tahun');
    }
}
