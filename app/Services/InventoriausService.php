<?php
namespace App\Services;

use App\Models\Inventorius;

class InventoriausService
{
    public static function available_inventorius($uzsakymo_data, $tipas)
    {
        $uzimtumas = new Inventorius;
        $inventorius = $uzimtumas->where('tipas', $tipas)->get();
        //dd($inventorius);
        
        $collection = collect();
        foreach ($inventorius as $inv) {
            $used = $inv->kiekis;
            if (sizeof($inv->uzsakymai)) {
                foreach ($inv->uzsakymai as $value) {
                    //dd($value );
                    if ($uzsakymo_data == $value->data) {
                        $used = $used - $value->pivot->kiekis;
                    }

                    if($used > 0 &&  !$collection->contains($inv)){
                        $collection->push($inv);
                    }
                }
            } 
            else{
                $collection->push($inv);
            }
            
        }

        return $collection;
    }

    public static function available_kiekis($id, $uzsakymo_data)
    {
        $inventorius = Inventorius::with(['uzsakymai' => function ($query) use ($uzsakymo_data) {
            $query->where('data', $uzsakymo_data);
        }])->find($id);

        if (!$inventorius) {
            return 0;
        }
        $used = $inventorius[0]->kiekis;
        foreach ($inventorius[0]->uzsakymai as $uzsakymas) {
            $used -= $uzsakymas->pivot->kiekis;
        }
        
        return $used; 
    }
}