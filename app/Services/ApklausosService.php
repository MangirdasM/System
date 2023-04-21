<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\DB;
use App\Models\User;

    class ApklausosService
    {
        public function __invoke()
        {
            $user = new User;
            $user->password = Hash::make('test');
            $user->prisijungimoVardas = 'asbv';
            $user->pareigos = 'Darbuotojas';
            $user->save();
        }
    }
?>