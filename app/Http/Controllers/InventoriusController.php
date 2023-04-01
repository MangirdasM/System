<?php

namespace App\Http\Controllers;

use App\Models\Inventorius;
use Illuminate\Http\Request;

class InventoriusController extends Controller
{
    function index(){
        return view('inventorius.index', [
        
            'heading'=>'Labas rytas',
            'inventorius'=>Inventorius::all()
        ]);
    }

    public function create(){
        return view('inventorius.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $formFields = $request->all();

        Inventorius::create($formFields);
        
        
        return redirect('/inventorius');
    }
}
