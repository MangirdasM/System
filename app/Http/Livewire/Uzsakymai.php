<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uzsakymas;
use Livewire\WithPagination;

class Uzsakymai extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.uzsakymai',[
            'uzsakymai' => Uzsakymas::paginate(6)
        ]);
    }

    public function deleteUzsakymas($id){
        Uzsakymas::find($id)->delete();
        session()->flash('message', 'Post successfully updated.');
    }
}
