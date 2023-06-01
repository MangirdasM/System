<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apklausa extends Model
{
    use HasFactory;
    protected $table = 'apklausos';

    protected $fillable = ['gedimai', 'komentarai', 'kuras', 'virsvalandziai', 'islaidos', 'filled'];

    public function uzsakymai(): BelongsTo {
        return $this->belongsTo(Uzsakymas::class, 'uzsakymas_id', 'id');
    }
}

