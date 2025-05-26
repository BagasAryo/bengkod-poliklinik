<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
    ];

    public function daftarPoli(): HasMany
    {
        return $this->hasMany(DaftarPoli::class, 'id_pasien');
    }
}
