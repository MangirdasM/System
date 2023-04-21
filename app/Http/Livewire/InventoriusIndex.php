<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inventorius;

class InventoriusIndex extends Component
{
    public function render()
    {
        return view('livewire.inventorius-index', [
            'inventorius' => Inventorius::paginate(10)
        ]);
    }

    public function deleteInventorius($id){
        Inventorius::find($id)->delete();
        session()->flash('message', 'Inventorius sėkmingai ištrintas!');
    }
}
