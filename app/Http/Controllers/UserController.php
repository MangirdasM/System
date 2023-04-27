<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        'prisijungimoVardas'=>['required', 'unique:users,prisijungimoVardas'],
        'pareigos' => 'required',
        'password'=>['required', 'confirmed']], [
            'prisijungimoVardas.unique' => 'Šis prisijungimo vardas jau užimtas!',
            'prisijungimoVardas.required' => 'Prisijungimo vardo laukas yra privalomas!',
            'password.required' => 'Slaptažodžio laukas yra privalomas!',
            'password.confirmed' => 'Slaptažodžiai nesutampa!',
        ]
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
            'filled' => 'required'
        ], [
            'prisijungimoVardas.unique' => 'Šis prisijungimo vardas jau užimtas!',
            'vardas.required' => 'Vardo laukas yra privalomas!',
            'pavarde.required' => 'Pavardes laukas yra privalomas!',
            'telefonas.required' => 'Telefono laukas yra privalomas!',
            'prisijungimoVardas.required' => 'Prisijungimo vardo laukas yra privalomas!',
            'Epastas.required' => 'Elektroninio pašto laukas yra privalomas!',
            'Epastas.email' => 'Elektroninis paštas nėra tinkamo formato!',
        ]);

        $user->update($formFields);

        $user->save();


        return back()->with('message', 'Vartotojas atnaujintas!');
    }   
}
