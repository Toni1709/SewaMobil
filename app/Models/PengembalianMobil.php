<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengembalianMobil extends Model
{
    protected $table = 'pengembalian_mobils';
    protected $fillable = [
        'tanggal',
        'pengguna_id',
        'mobil_id',
        'lama_sewa',
        'total_harga',
    ];

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class);
    }
    public function mobil(): BelongsTo
    {
        return $this->belongsTo(ManajemenMobil::class, 'mobil_id', 'id');
    }
}
