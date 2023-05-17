<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    public function username()
    {
        return 'prisijungimoVardas';
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

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'prisijungimoVardas' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            if(Auth::user()->filled == 1){
                return redirect()->intended('pagrindinis');
            }
            else{
                return redirect()->intended('redagavimas');
            }
            
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
