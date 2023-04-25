<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Apklausa;
use Livewire\WithPagination;

class Apklausos extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.apklausos',[
            'apklausos' => Apklausa::paginate(6)
        ]);
    }

    public function deleteApklausa($id){
        Apklausa::find($id)->delete();
        session()->flash('message', 'Apklausa sėkmingai pašalinta!');
    }
}
