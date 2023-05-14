<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesantrenTerdekat extends Model
{
    use HasFactory;

    protected $table = 'pesantren_terdekat';
    protected $fillable = [
        'no_statistik',
        'nama_lembaga',
        'no_telepon',
        'alamat',
    ];
}
