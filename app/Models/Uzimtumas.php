<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Uzimtumas extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'uzsakymas_id'];

    public function darbuotojai(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function uzsakymai(): BelongsTo {
        return $this->belongsTo(Uzsakymas::class, 'uzsakymas_id', 'id');
    }
}
