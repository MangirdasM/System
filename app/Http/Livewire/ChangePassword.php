<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class ChangePassword extends ModalComponent
{
    public $old_password;
    public $new_password;
    public $new_password_confirmation;

    protected $rules = [
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
        'new_password_confirmation' => 'same:new_password',
    ];

    public function render()
    {
        return view('livewire.change-password');
    }


    public function submit()
    {
        $this->validate();
        

        #Match The Old Password
        if(!Hash::check($this->old_password, auth()->user()->password)){
            session()->flash('message', 'Neteisingas slaptažodis.');
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($this->new_password)
            
        ]);
        session()->flash('message', 'Slaptažodis atnaujintas.');
    }


}
