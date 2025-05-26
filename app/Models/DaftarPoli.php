<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DaftarPoli extends Model
{
    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'keluhan',
        'no_antrian',
    ];

    public function jadwalPeriksa(): BelongsTo
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    public function pasien(): belongsTo
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function periksa(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_periksa');
    }
}
