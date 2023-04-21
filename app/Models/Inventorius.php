<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventorius extends Model
{
    use HasFactory;

    protected $fillable = [
        'pavadinimas',
        'kiekis',
        'tipas',
        'komentarai',
        'kodas',
        'nuotrauka',
    ];

    public function uzsakymai(){
        return $this->belongsToMany(Uzsakymas::class, 'inv_uzimtumas')->withPivot('kiekis');
    }
}
