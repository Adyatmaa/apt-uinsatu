<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPendidikan_terakhir extends Model
{
    use HasFactory;
    protected $table = 'm_pendidikan_terakhir';
    protected $pirmarykey = 'id_pendidikan_terakhir';
    public $timestamps = false;
    protected $fillable = [
        'pendidikan_terakhir',
    ];
}
