<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
        return view('darbuotojai.index', [
        
            'heading'=>'Labas rytas',
            'darbuotojai'=>User::all()
        ]);
    }

    public function create(){
        return view('darbuotojai.create');
    }

    public function show(User $user)
    {
        
        return view('darbuotojai.show', [
            'darbuotojas' => $user

        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
        'prisijungimoVardas'=>'required',
        'password'=>'required']
        );
        
        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);
        
        return redirect('/darbuotojai')->with('message', 'Darbuotojas sėkmingai sukurtas!');
    }

    

    public function edit(){
        return view('darbuotojai.edit')->with('user', auth()->user());
    }

    public function update(Request $request)
    {   

        $user = Auth::user();
        $formFields = $request->validate([
            'vardas' => 'required',
            'pavarde' => 'required',
            'telefonas' => 'required',
            'prisijungimoVardas' => 'required',
            'Epastas' => 'required|email',
        ]);

        $user->update($formFields);

        $user->save();


        return back()->with('message', 'Vartotojas atnaujintas!');
    }   
}
