<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_Uzimtumas extends Model
{
    use HasFactory;

    public function inventorius() {
        return $this->belongsTo('Inventorius');
    }
    public function uzsakymai() {
        return $this->belongsTo('Uzsakymas');
    }
}
