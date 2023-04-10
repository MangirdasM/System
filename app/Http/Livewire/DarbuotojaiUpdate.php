<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uzimtumas;
use App\Http\Controllers\UzimtumasController;

class DarbuotojaiUpdate extends Component
{
    public $uzsakymas;
    public function render()
    {
        return view('livewire.darbuotojai-update', [
            'uzsakymas' => $this->uzsakymas,
            'darbuotojai' => UzimtumasController::available_darbuotojai($this->uzsakymas->data),
        ]);
    }

    public function deleteDarbuotojas($id){
        Uzimtumas::find($id)->delete();
        session()->flash('message', 'Darbuotojas sėkmingai pašalintas!');
    }

    public function update($user_id, $uzimtumas_id){
        
        Uzimtumas::find($uzimtumas_id)->update(['user_id'=>$user_id]);
        return redirect(request()->header('Referer'));
    }
}
