<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inv_Uzimtumas;
use App\Services\InventoriausService;

class InventoriausForm extends Component
{
    public $user_id;
    public $kiekis;
    public $tipas;

    public $uzsakymas_id;
    public $uzsakymas_data;

    public $showDiv = false;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function render()
    {   
        //InvUzimtumasController::available_inventorius($this->uzsakymas_data);
        return view('livewire.inventoriaus-form', [
            // 'darbuotojai' => InvUzimtumasController::available_inventorius($this->uzsakymas_data),
            'darbuotojai' => InventoriausService::available_inventorius($this->uzsakymas_data, $this->tipas),
            'likutis' => InventoriausService::available_kiekis($this->user_id, $this->uzsakymas_data,)
        ]);
    }

    public function submit()
    {
        $available = InventoriausService::available_kiekis($this->user_id, $this->uzsakymas_data);

        if(!empty($this->user_id)){
            
            Inv_Uzimtumas::create([
                'inventorius_id' => $this->user_id, 
                'uzsakymas_id' => $this->uzsakymas_id,
                'kiekis' => $this->kiekis
            ]);
            session()->flash('message', 'Darbuotojas sėkmingai pridėtas');
            sleep(1);
        }
        elseif($this->kiekis > $available){
            session()->flash('message', 'Turimas kiekis yra nepakankamas!');
            sleep(1);
        }
        else{
            session()->flash('message', 'Nepasirinkote inventoriaus!');
            sleep(2);
        }

        
 
        
        
        $this->emit('refreshComponent');
    }
}
