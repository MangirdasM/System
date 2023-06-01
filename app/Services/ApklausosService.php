<?php

namespace App\Services;

use App\Models\Apklausa;
use App\Models\Uzsakymas;

class ApklausosService
{
    public function __invoke()
    {

        $uzsakymai = Uzsakymas::whereDate('data', now()->toDateString())->get();

        foreach ($uzsakymai as $uzsakymas) {
            foreach ($uzsakymas->darbuotojai as $value) {
                $apklausa = new Apklausa;
                $apklausa->uzsakymas_id = $uzsakymas->id;
                $apklausa->darbuotojas_id = $value->id;
                $apklausa->kuras = '0';
                $apklausa->save();
            }
        }
    }
}
