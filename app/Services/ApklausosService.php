<?php

namespace App\Services;

use App\Models\Apklausa;
use App\Models\Uzsakymas;

class ApklausosService
{
    public function __invoke()
    {

        $uzsakymai = Uzsakymas::all();
        foreach ($uzsakymai as $uzsakymas) {
            if ($uzsakymas->data == now()->toDateString()) {

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
}
