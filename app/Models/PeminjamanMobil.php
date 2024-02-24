<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeminjamanMobil extends Model
{
    protected $table = 'peminjaman_mobils';
    protected $fillable = [
        'pengguna_id',
        'mobil_id',
        'tgl_mulai_sewa',
        'tgl_selesai_sewa',
        'total_sewa',
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
