<?php

namespace App\Http\Controllers;

use App\Models\Inventorius;
use Illuminate\Http\Request;

class InvUzimtumasController extends Controller
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

                    if($used > 0 ){
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

    public static function available_kiekis($id, $kiekis, $uzsakymo_data)
    {
        $uzimtumas = new Inventorius;
        $inventorius = $uzimtumas->where('id', $id)->get();
        //dd($inventorius);
        
        $collection = collect();

        foreach ($inventorius as $inv) {
            $used = $inv->kiekis;
            foreach ($inv->uzsakymai as $value) {
            
                if ($uzsakymo_data == $value->data) {
                    $used = $used - $value->pivot->kiekis;
                }
            }
            return $used;
        }
        
        
    }
}
