<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_item()
    {
        $parameters = [
            'id1' => 'abc',
            'id2' => '123',
        ];
        $response = $this->post('api/item/uuid', $parameters);

        $response->assertStatus(200);

        $response->assertJsonStructure(['uuid']);

        $item1 = $response->json();

        $response = $this->post('api/item/uuid', $parameters);

        $item2 = $response->json();

        $this->assertEquals($item1['uuid'], $item2['uuid']);
    }
}
