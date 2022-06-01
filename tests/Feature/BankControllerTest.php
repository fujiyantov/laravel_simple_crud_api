<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BankControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllBanks()
    {
        $response = $this->get('/api/banks');

        $response->assertStatus(200)->assertJsonStructure(
            [
                [
                    "id",
                    "name",
                    "code",
                    "created_at",
                    "updated_at"
                ]
            ]
        );
    }
}
