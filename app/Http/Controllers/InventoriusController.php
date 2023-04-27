<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventorius;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $formFields = $request->validate([
            'pavadinimas' => 'required',
            'kiekis' => 'required',
            'tipas' => 'required',
            'kodas' => 'required',
            'komentarai' => 'required',
            'nuotrauka' => 'file|image|mimes:jpg,jpeg,png,gif'
        ],[
            'pavadinimas.required' => 'Pavadinimo laukas yra privalomas!',
            'kiekis.required' => 'Kiekio laukas yra privalomas!',
            'kodas.required' => 'Kontaktinio numerio laukas yra privalomas!',
        ]);

        $imagePath = request('nuotrauka')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        $formFields['nuotrauka'] = $imagePath;
        Inventorius::create($formFields);
        
        return redirect('/inventorius')->with('message', 'Inventorius sėkmingai sukurtas!');
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
            'nuotrauka' => 'file|image|mimes:jpg,jpeg,png,gif',
            'tipas' => 'required',
        ], [
            'pavadinimas.required' => 'Pavadinimo laukas yra privalomas!',
            'kiekis.required' => 'Kiekio laukas yra privalomas!',
            'kodas.required' => 'Kodo laukas yra privalomas!',
        ]);

        $imagePath = request('nuotrauka')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        $formFields['nuotrauka'] = $imagePath;

        $inv->update($formFields);

        return redirect('/inventorius')->with('message', 'Inventorius sėkmingai atnaujintas!');
    }

    public function delete(Inventorius $inventorius)
    {
        $inventorius->delete();
        return redirect('/inventorius')->with('message', 'Inventorius sėkmingai pašalintas!');
    }
}
