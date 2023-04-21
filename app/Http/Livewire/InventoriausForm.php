<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inventorius;
use App\Models\Inv_Uzimtumas;
use App\Http\Controllers\InvUzimtumasController;

class InventoriausForm extends Component
{
    public $user_id;
    public $kiekis;
    public $tipas;

    public $uzsakymas_id;
    public $uzsakymas_data;

    public $showDiv = false;

    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields(){
        $this->user_id = '';
    }

    public function render()
    {   
        //InvUzimtumasController::available_inventorius($this->uzsakymas_data);
        return view('livewire.inventoriaus-form', [
            // 'darbuotojai' => InvUzimtumasController::available_inventorius($this->uzsakymas_data),
            'darbuotojai' => InvUzimtumasController::available_inventorius($this->uzsakymas_data, $this->tipas),
            'likutis' => InvUzimtumasController::available_kiekis($this->user_id, $this->kiekis, $this->uzsakymas_data,)
        ]);
    }

    public function submit()
    {

        
        foreach ($this->user_id as $key => $value) {
            //InvUzimtumasController::available_kiekis($this->user_id[$key], $this->kiekis[$key]);
            Inv_Uzimtumas::create([
                'inventorius_id' => $this->user_id[$key], 
                'uzsakymas_id' => $this->uzsakymas_id,
                'kiekis' => $this->kiekis[$key]
            ]);
        }
 
        $this->inputs = [];
 
        $this->resetInputFields();
        session()->flash('message', 'Darbuotojas sėkmingai pridėtas');
    }
}
