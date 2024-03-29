<?php

namespace App\Http\Controllers;

use App\Models\Uzsakymas;
use App\Models\Inventorius;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UzsakymaiController extends Controller
{
    function index(){
        return view('uzsakymai.index');
    }

    public function show(Uzsakymas $uzsakymas, User $darbuotojas, Inventorius $inv)
    {
        // $user = User::where('name', '=', 'TOmas')->first();
        // if ($user != null) {
        //     dd($user);
        // }
        return view('uzsakymai.show', [
            'uzsakymas' => $uzsakymas,
            'inv' => $inv->all(),
            'darbuotojai' => $darbuotojas->all()
        ]);
    }

    public function create(){
        return view('uzsakymai.create');
    }

    public function store(Request $request){
        
        $formFields = $request->validate([
            'data' => 'required',
            'vieta' => 'required',
            'papildoma' => 'nullable',
            'kontaktinisasmuo' => 'required',
            'sventestipas' => 'required',
            'kontaktinisnumeris' => 'required',
        ],[
            'data.required' => 'Datos laukas yra privalomas!',
            'vieta.required' => 'Vietos laukas yra privalomas!',
            'kontaktinisasmuo.required' => 'Kontaktinio asmens laukas yra privalomas!',
            'kontaktinisnumeris.required' => 'Kontaktinio numerio laukas yra privalomas!',
        ]);

        Uzsakymas::create($formFields);
        
        
        return redirect('/uzsakymai');
    }

    // Show edit form
    public function edit(Uzsakymas $uzsakymas){
        return view('uzsakymai.edit', ['uzsakymas' => $uzsakymas]);
    }

    #update
    // Update listing data
    public function update(Request $request, Uzsakymas $uzsakymas)
    {
        $formFields = $request->validate([
            'data' => 'required',
            'vieta' => 'required',
            'papildoma' => 'required',
            'kontaktinisasmuo' => 'required',
            'sventestipas' => 'required',
            'kontaktinisnumeris' => 'required',
        ], [
            'data.required' => 'Datos laukas yra privalomas!',
            'vieta.required' => 'Vietos laukas yra privalomas!',
            'kontaktinisasmuo.required' => 'Kontaktinio asmens laukas yra privalomas!',
            'kontaktinisnumeris.required' => 'Kontaktinio numerio laukas yra privalomas!',
            'papildoma.required' => 'Papildomos informacijos laukas yra privalomas!',
        ]);
        $uzsakymas->update($formFields);

        return back()->with('message', 'Listing updated succesfully!');
    }

    #delete
    public function delete(Uzsakymas $uzsakymas)
    {
        $uzsakymas->delete();
        return redirect('/uzsakymai')->with('message', 'Užsakymas sėkmingai pašalintas!');
    }
}
