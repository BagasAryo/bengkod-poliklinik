<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    protected $fillable = [
        'nama_obat',
        'jenis_obat',
        'harga',
        'stok',
    ];

    public function obat(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }}
