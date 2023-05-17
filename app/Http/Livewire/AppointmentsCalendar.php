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

        $user =  User::where('id', Auth::user()->id)->get();
        $uzsakymai = $user[0]->uzsakymai;

        $uzsakymai_calendar =  $uzsakymai
        ->map(function ($uzsakymai) {
            return [
                'id' => $uzsakymai->id,
                'title' => $uzsakymai->vieta,
                'date' => $uzsakymai->data,
                'description' => $uzsakymai->sventestipas
            ];
        });


        $uzsakymai_collection = new \Illuminate\Database\Eloquent\Collection($uzsakymai_calendar);
        return $uzsakymai_collection;
    }
}
