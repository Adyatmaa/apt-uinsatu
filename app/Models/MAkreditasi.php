<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAkreditasi extends Model
{
    use HasFactory;
    protected $table = 'm_akreditasi';
    protected $primaryKey = 'id_akreditasi';
    public $timestamps = false;
    protected $fillable = [
        'akreditasi',
    ];

    public function prodi()
    {
        return $this->hasMany(MProdi::class, 'id_akreditasi');
    }
}
