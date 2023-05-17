<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Uzimtumas;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\DarbuotojuForm;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExampleTest extends TestCase
{
    #use RefreshDatabase;
    use HasFactory;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/pagrindinis');

        $response->assertStatus(200);
    }

    
    public function test_prisijungimas_screen_can_be_rendered()
    {
        $response = $this->get('/prisijungimas');
 
        $response->assertStatus(200);
    }

    public function test_create_new_darbuotojas()
    {
        // $user = User::create([
        //     'prisijungimoVardas' => 'test',
        //     'pareigos' => 'Administratorius',
        //     'password' => 'test'
        // ]);

        $response = $this->post('/darbuotojai', [
            'prisijungimoVardas' => 'test',
            'pareigos' => 'Administratorius',
            'password' => 'test',
            'password_confirmation' => 'test',
        ]);

        $this->assertDatabaseHas('users', [
            'prisijungimoVardas' => 'test',]);
        
        #$response = $this->actingAs($user);
        

        #$this->assertAuthenticated();
    }
}
