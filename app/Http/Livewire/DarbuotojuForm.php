<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uzimtumas;
use App\Http\Controllers\UzimtumasController;

class DarbuotojuForm extends Component
{
    public $user_id;
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
        UzimtumasController::available_darbuotojai($this->uzsakymas_data);
        return view('livewire.darbuotoju-form', [
            'darbuotojai' => UzimtumasController::available_darbuotojai($this->uzsakymas_data),
        ]);
    }

    public function submit()
    {
        foreach ($this->user_id as $key => $value) {
            Uzimtumas::create([
                'user_id' => $this->user_id[$key], 
                'uzsakymas_id' => $this->uzsakymas_id,
            ]);
        }
 
        $this->inputs = [];
 
        $this->resetInputFields();
        session()->flash('message', 'Darbuotojas sėkmingai pridėtas');
    }
}
