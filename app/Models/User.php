<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'vardas',
        'pavarde',
        'Epastas',
        'telefonas',
        'pareigos',
        'prisijungimoVardas',
        'password',
        'filled'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasRole($role)
    {
        return $this->pareigos == $role;
    }

    public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }

    public function uzsakymai()
    {
        return $this->belongsToMany(Uzsakymas::class, 'uzimtumas');
    }
}
