<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Uzimtumas;
use App\Models\Uzsakymas;
use Illuminate\Support\Facades\Auth;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events() : EloquentCollection
    {
        $uzsakymai = Uzsakymas::all();

        $a =  User::where('id', Auth::user()->id)->get();
        $uzsakymai = $a[0]->uzsakymai;
        #dd($a);
        $c =  $uzsakymai
        ->map(function ($uzsakymai) {
            return [
                'id' => $uzsakymai->id,
                'title' => $uzsakymai->vieta,
                'date' => $uzsakymai->data,
                'description' => $uzsakymai->sventestipas
            ];
        });


        $b = new \Illuminate\Database\Eloquent\Collection($c);
        return $b;
    }
}
