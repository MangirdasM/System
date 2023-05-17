<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Uzsakymas;
use App\Http\Livewire\Uzsakymai;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UzsakymaiTest extends TestCase
{
    protected $uzsakymas;
    protected function setUp(): void
    {
        parent::setUp();
        $this->uzsakymas = Uzsakymas::factory()->create();
    }

    public function test_create_new_uzsakymas()
    {

        $response = $this->post('/uzsakymai', [
            'data' => '2023-05-06',
            'vieta' => 'Kaunas',
            'papildoma' => 'Renginys lauke',
            'sventestipas' => 'Gimtadienis',
            'kontaktinisasmuo' => 'TOmas',
            'kontaktinisnumeris' => '863379774',
        ]);

        $this->assertDatabaseHas('uzsakymas', [
            'vieta' => $this->uzsakymas->vieta]);
    }
    public function test_remove_uzsakymas()
    {
        $response = Livewire::test(Uzsakymai::class);

        $response->call('deleteUzsakymas', $this->uzsakymas->id);

        $this->assertDatabaseMissing('uzsakymas', [
            'id' => $this->uzsakymas]);
    }


    public function test_uzsakymai_screen_can_be_rendered()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->get('/uzsakymai');
 
        $response->assertStatus(200);
    }

    public function test_update_uzsakymas()
    {
        $user = User::find(2);
        
        $response = $this->actingAs($user)->put('/uzsakymai/'.$this->uzsakymas->id, [
            'data' => '2023-05-06',
            'vieta' => 'Vilnius',
            'papildoma' => 'Renginys lauke',
            'sventestipas' => 'Gimtadienis',
            'kontaktinisasmuo' => 'TOmas',
            'kontaktinisnumeris' => '863379774',
        ]);
 
        $this->assertDatabaseHas('uzsakymas', [
            'vieta' => 'Vilnius',]);
    }

    // function test_can_create_post()
    // {
    //     $this->actingAs(User::find(2));
 
    //     $response = Livewire::test(DarbuotojuForm::class)
    //         ->set('user_id', ['1'])
    //         ->set('uzsakymas_id', ['1']);

    //     dd($response);

    //     $this->assertTrue(Uzimtumas::where('uzsakymas_id', '1')->exists());
    // }
}
