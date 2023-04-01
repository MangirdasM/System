<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uzimtumas;
use App\Http\Controllers\UzimtumasController;

class Darbuotojai extends Component
{
    public $uzsakymas;
    public $user_id;
    public function render()
    {
        return view('livewire.darbuotojai', [
            'uzsakymas' => $this->uzsakymas,
            'darbuotojai' => UzimtumasController::available_darbuotojai($this->uzsakymas->data),
        ]);
    }

    public function deleteDarbuotojas($id){
        Uzimtumas::find($id)->delete();
        session()->flash('message', 'Post successfully updated.');
    }
}
