<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PositionsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllPositions()
    {
        $response = $this->get('/api/positions');

        $response->assertStatus(200)->assertJsonStructure([
            [
                "name",
                "id",
                "created_at",
                "updated_at",
            ]
        ]);
    }
}
