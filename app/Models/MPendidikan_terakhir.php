<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPendidikan_terakhir extends Model
{
    use HasFactory;
    protected $table = 'm_pendidikan_terakhir';
    protected $primarykey = 'id_pendidikan_terakhir';
    public $timestamps = false;
    protected $fillable = [
        'pendidikan_terakhir',
    ];

    public function dosen()
    {
        return $this->hasMany(DtDosen::class, 'id_pendidikan_terakhir', 'id_pendidikan_terakhir');
    }
}
