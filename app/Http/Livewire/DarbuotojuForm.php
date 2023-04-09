<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Uzimtumas;
use App\Models\Uzsakymas;
use App\Http\Controllers\UzimtumasController;
use App\Http\Controllers\UzsakymaiController;

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
        //dd($uzimtumas->all()->where($uzimtumas->darbuotojai->id));
        //dd($uzimtumas->find(1)->darbuotojai()->get());
        UzimtumasController::available_darbuotojai($this->uzsakymas_data);
        return view('livewire.darbuotoju-form', [
            'darbuotojai' => UzimtumasController::available_darbuotojai($this->uzsakymas_data),
        ]);
    }

    public function submit()
    {
        // $validatedData = $this->validate([
        //     'user_id.0' => 'required',
        //     'uzsakymas_id.0' => 'required',
        //     'user_id.*' => 'required',
        //     'uzsakymas_id.*' => 'required',
        // ]);
        

        $uzimtumas = new Uzimtumas;
        foreach ($this->user_id as $key => $value) {
            Uzimtumas::create([
                'user_id' => $this->user_id[$key], 
                'uzsakymas_id' => $this->uzsakymas_id,
            ]);
            // $uzimtumas->user_id = $this->user_id[$key];
            // $uzimtumas->uzsakymas_id = $this->uzsakymas_id;
            // $uzimtumas->save();
            //dump($uzimtumas);
        }
 
        $this->inputs = [];
 
        $this->resetInputFields();
        session()->flash('message', 'Employee Has Been Created Successfully.');

        // $uzimtumas = new Uzimtumas;
        // $uzimtumas->user_id = $this->user_id;
        // $uzimtumas->uzsakymas_id = $this->uzsakymas_id;
        // $uzimtumas->save();
    }
}
