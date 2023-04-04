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
        //dd($request->all());
        $formFields = $request->validate([
        'prisijungimoVardas'=>'required',
        'Epastas'=>'required',
        'password'=>'required']
        );
        
        $formFields['password'] = bcrypt($formFields['password']);


        //dd($formFields);
        User::create($formFields);
        
        
        return redirect('/darbuotojai');
    }

    

    // public function edit(User $darbuotojas){
    //     $darbuotojas => User::auth();
    //     return view('darbuotojai.edit', ['darbuotojas' => $darbuotojas]);
    //}

    public function update(User $user, Request $request)
    {   
        $user->update([
            'vardas' => $request->name,
            'epastas' => $request->email,
        ]);

        return $this->success('profile','Profile updated successfully!');
    }
    
}
