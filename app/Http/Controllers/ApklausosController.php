<?php

namespace App\Http\Controllers;

use App\Models\Apklausa;
use Illuminate\Http\Request;

class ApklausosController extends Controller
{
    function index(){
        return view('apklausos.index');
    }

    public function show(Apklausa $apklausa)
    {
        return view('apklausos.show', [
            'apklausa' => $apklausa,
        ]);
    }

    public function edit(Apklausa $apklausa){
        return view('apklausos.edit', ['apklausa' => $apklausa]);
    }

    public function update(Request $request, Apklausa $apklausa)
    {   
        #dd($request->all());
        $formFields = $request->validate([
            'virsvalandziai' => 'required',
            'islaidos' => 'required',
            'kuras' => 'required',
            'gedimai' => 'required',
            'komentarai' => 'required',
        ],[
            'virsvalandziai.required' => 'Datos laukas yra privalomas!',
            'islaidos.required' => 'Vietos laukas yra privalomas!',
            'kuras.required' => 'Kontaktinio asmens laukas yra privalomas!',
            'gedimai.required' => 'Kontaktinio numerio laukas yra privalomas!',
            'komentarai.required' => 'Kontaktinio numerio laukas yra privalomas!',
        ]);
        
        $apklausa->update($formFields);

        return redirect('/apklausos')->with('message', 'Apklausa užpildyta!');
    }
}
