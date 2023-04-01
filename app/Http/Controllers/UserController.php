<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        'slaptazodis'=>'required']
        );
        
        $formFields['slaptazodis'] = bcrypt($formFields['slaptazodis']);


        //dd($formFields);
        User::create($formFields);
        
        
        return redirect('/darbuotojai');
    }

    public function login(){
        return view('darbuotojai.login');
    }

    public function logout(Request $request){
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out');
    }

    // Auth user
    public function authenticate(){
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            request()->session()->regenerate();

            return redirect('/pagrindinis')->with('message', 'You are logged in');
        }

        return back()->withErrors(['email' => 'Invalid crediantials'])->onlyInput('email');
    }

    public function return_name($id){
        return User::all()->where($id);
    }

    
}
