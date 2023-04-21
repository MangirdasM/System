<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        #dd($request->all());
        $formFields = $request->validate([
            'pavadinimas' => 'required',
            'kiekis' => 'required',
            'tipas' => 'required',
            'kodas' => 'required',
            'komentarai' => 'required',
            'nuotrauka' => 'required'
        ],[
            'pavadinimas.required' => 'Pavadinimo laukas yra privalomas!',
            'kiekis.required' => 'Kiekio laukas yra privalomas!',
            'kodas.required' => 'Kontaktinio numerio laukas yra privalomas!',
        ]);

        Inventorius::create($formFields);
        
        return redirect('/uzsakymai');
    }

    public function show(Inventorius $inv, User $darbuotojas)
    {
        // $user = User::where('name', '=', 'TOmas')->first();
        // if ($user != null) {
        //     dd($user);
        // }
        return view('inventorius.show', [
            'inv' => $inv,
            'darbuotojai' => $darbuotojas->all()
        ]);
    }

    // Show edit form
    public function edit(Inventorius $inv){
        return view('inventorius.edit', ['inv' => $inv]);
    }

    #update
    // Update listing data
    public function update(Request $request, Inventorius $inv)
    {
        $formFields = $request->validate([
            'pavadinimas' => 'required',
            'kiekis' => 'required',
            'kodas' => 'required',
            'komentarai' => 'required',
            'nuotrauka' => 'required',
            'tipas' => 'required',
        ]);
        $inv->update($formFields);

        return back()->with('message', 'Inventorius sėkmingai atnaujintas!');
    }
}
