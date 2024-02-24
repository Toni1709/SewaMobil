<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ManajemenMobil extends Model
{
    protected $table = 'manajemen_mobils';
    protected $fillable = [
        'pengguna_id',
        'merek',
        'model',
        'no_plat',
        'tarif',
        'foto',
    ];
    
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class);
    }
}
