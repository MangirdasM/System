<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inv_Uzimtumas extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'inv_uzimtumas';
    protected $fillable = ['inventorius_id', 'uzsakymas_id', 'kiekis'];

    public function inventorius(): BelongsTo {
        return $this->belongsTo(Inventorius::class, 'inventorius_id', 'id');
    }
    public function uzsakymai(): BelongsTo {
        return $this->belongsTo(Uzsakymas::class, 'uzsakymas_id', 'id');
    }
}
