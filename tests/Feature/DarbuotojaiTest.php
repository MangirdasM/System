<?php

namespace Tests\Feature;

use App\Http\Livewire\DarbuotojuForm;
use Tests\TestCase;
use App\Models\User;
use App\Models\Uzimtumas;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DarbuotojaiTest extends TestCase
{
    #use RefreshDatabase;
    public function test_create_new_darbuotojas()
    {

        $response = $this->post('/darbuotojai', [
            'prisijungimoVardas' => 'test',
            'pareigos' => 'Administratorius',
            'password' => 'test',
            'password_confirmation' => 'test',
        ]);

        $this->assertDatabaseHas('users', [
            'prisijungimoVardas' => 'test',]);
    }
    public function test_remove_darbuotojas()
    {
    }

    public function test_darbuotojas_can_login()
    {
        $response = $this->post('/users/authenticate', [
            'prisijungimoVardas' => 'test',
            'password' => 'test',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect('/redaguoti');
    }

    public function test_darbuotojas_can_not_login_with_invalid_password()
    {
        $response = $this->post('/users/authenticate', [
            'prisijungimoVardas' => 'test',
            'password' => 'testwrong',
        ]);
 
        $this->assertGuest();
    }

    public function test_prisijungimas_screen_can_be_rendered()
    {
        $response = $this->get('/prisijungimas');
 
        $response->assertStatus(200);
    }

    public function test_update_darbuotojas()
    {
        $user = User::find(2);
        
        $response = $this->actingAs($user)->put('/redaguoti', [
            'vardas' => 'test_name',
            'pavarde' => 'pavarde',
            'Epastas' => 'test@test.com',
            'telefonas' => '863379774',
            'filled' => '1',
            'prisijungimoVardas' => 'testt',
        ]);
 
        $this->assertDatabaseHas('users', [
            'vardas' => 'test_name',]);
    }

    function test_can_create_post()
    {
        $this->actingAs(User::find(2));
 
        $response = Livewire::test(DarbuotojuForm::class)
            ->set('user_id', ['1'])
            ->set('uzsakymas_id', ['1']);

        $response->call('submit');

        $this->assertTrue(Uzimtumas::where('uzsakymas_id', '1')->exists());
    }
}
