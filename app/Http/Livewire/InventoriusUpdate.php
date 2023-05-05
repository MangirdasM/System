<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inv_Uzimtumas;
use App\Http\Controllers\InvUzimtumasController;

class InventoriusUpdate extends Component
{
    public $uzsakymas;
    public $tipas;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.inventorius-update', [
            'uzsakymas' => $this->uzsakymas,
        ]);
    }

    public function deleteInventorius($id){
        Inv_Uzimtumas::find($id)->delete();
        $this->emit('refreshComponent');
        session()->flash('message', 'Inventorius sėkmingai pašalintas!');
    }

    public function update($user_id, $uzimtumas_id){
        
        Inv_Uzimtumas::find($uzimtumas_id)->update(['inventorius_id'=>$user_id]);
        return redirect(request()->header('Referer'));
    }
}
