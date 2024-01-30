<?php

namespace Tests\Feature;

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelControllerApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_hotels()
    {
        Hotel::factory()->count(3)->create();

        $response = $this->get('api/hotels');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'hotels');
    }

    public function test_can_create_hotel()
    {
        $hotelData = [
            'name' => 'Nome do Hotel',
            'address' => 'Endereço do Hotel',
            'city' => 'Cidade',
            'state' => 'UF',
            'zip_code' => 'CEP',
            'website' => 'http://www.bukly.com'
        ];

        $response = $this->post('api/hotels', $hotelData);

        $response->assertStatus(201)
            ->assertJsonFragment($hotelData);

        $this->assertDatabaseHas('hotels', $hotelData);
    }
}
