<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'id_poli',
    ];

    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function jadwalPeriksa(): HasMany
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }
}
