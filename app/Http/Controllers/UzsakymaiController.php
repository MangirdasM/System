<?php

namespace App\Http\Controllers;

use App\Models\Uzimtumas;
use App\Models\Uzsakymas;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UzsakymaiController extends Controller
{
    function index(){
        return view('uzsakymai.index', [
        
            'heading'=>'Labas rytas',
            'uzsakymai'=>Uzsakymas::paginate(5)
        ]);
    }

    public function show(Uzsakymas $uzsakymas, User $darbuotojas)
    {
        // $user = User::where('name', '=', 'TOmas')->first();
        // if ($user != null) {
        //     dd($user);
        // }
        return view('uzsakymai.show', [
            'uzsakymas' => $uzsakymas,
            'darbuotojai' => $darbuotojas->all()
        ]);
    }

    public function create(){
        return view('uzsakymai.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $formFields = $request->all();

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
        // Check if user is owner
        // if($uzsakymas->user_id != auth()->id()){
        //     abort('403', 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'data' => 'required',
            'vieta' => 'required',
            'papildoma' => 'required',
            'kontaktinisasmuo' => 'required',
            'sventestipas' => 'required',
            'kontaktinisnumeris' => 'required',
        ]);

        // if ($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        //dd($formFields);
        $uzsakymas->update($formFields);

        return back()->with('message', 'Listing updated succesfully!');
    }

    #delete
    public function delete(Uzsakymas $uzsakymas)
    {
        $uzsakymas->delete();
        return redirect('/')->with('message', 'Užsakymas sėkmingai pašalintas!');
    }




}
