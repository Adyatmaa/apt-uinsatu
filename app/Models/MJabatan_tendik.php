<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJabatan_tendik extends Model
{
    use HasFactory;
    protected $table = 'm_jabatan_tendik';
    protected $primarykey = 'id_jabatan_tendik';
    public $timestamps = false;
    protected $fillable = [
        'jabatan_tendik',
    ];

    public function tendik()
    {
        return $this->hasMany(DTendik::class, 'id_jabatan_tendik', 'id_jabatan_tendik');
    }
}
