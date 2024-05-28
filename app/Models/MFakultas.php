<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MFakultas extends Model
{
    use HasFactory;
    protected $table = 'm_fakultas';
    protected $primaryKey = 'id_fakultas';
    protected $createdAt = 'create_date';
    protected $updatedAt = 'update_date';
    protected $fillable = [
        'nama_fakultas',
        'created_date',
        'update_date'
    ];

    public function prodi()
    {
        return $this->hasMany(MProdi::class, 'id_fakultas', 'id_fakultas');
    }
}
