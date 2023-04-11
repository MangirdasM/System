<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uzimtumas;
use Illuminate\Http\Request;

class UzimtumasController extends Controller
{
    public static function available_darbuotojai($uzsakymo_data)
    {
        // $uzimtumas = User::with('uzsakymai')->get();

        // $collection = $uzimtumas->filter(function ($darbuotojas) use ($uzsakymo_data) {
        //     return 
        //         $darbuotojas->uzsakymai->where('data', $uzsakymo_data)->isNotEmpty();
        // });

        // return $collection;
        $uzimtumas = new User;
        $darbuotojai = $uzimtumas->all();

        $collection = collect();

        foreach ($darbuotojai as $darbuotojas) {
            if (sizeof($darbuotojas->uzsakymai)) {
                foreach ($darbuotojas->uzsakymai as $value) {

                    if ($uzsakymo_data != $value->data) {
                        $collection->push($darbuotojas);
                    }
                }
            } 
            else{
                $collection->push($darbuotojas);
            }
            
        }

        return $collection;
    }



    public function store(Request $request)
    {
        $formFields = $request->all();

        Uzimtumas::create($formFields);

        return redirect('/uzsakymai');
    }
}
