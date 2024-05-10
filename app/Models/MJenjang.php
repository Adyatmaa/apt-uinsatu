<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJenjang extends Model
{
    use HasFactory;
    protected $table = 'm_jenjang';
    protected $primaryKey = 'id_jenjang';
    public $timestamps = false;
    protected $fillable = [
        'nama_jenjang',
    ];

    public function prodi()
    {
        return $this->hasMany(MProdi::class, 'id_jenjang');
    }
}
