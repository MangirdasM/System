<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uzsakymas extends Model
{
    use HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kontaktinisasmuo',
        'kontaktinisnumeris',
        'sventestipas',
        'vieta',
        'papildoma',
        'data',
    ];

    public function darbuotojai(){
        return $this->belongsToMany(User::class, 'uzimtumas')->withPivot('id');
    }

    public function inventorius(){
        return $this->belongsToMany(Inventorius::class, 'inv_uzimtumas')->withPivot('id', 'kiekis');
    }
}
