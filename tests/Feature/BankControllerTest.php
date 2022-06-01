<?php

namespace Tests\Feature;

use App\Models\Banks;
use Tests\TestCase;

class BankControllerTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        Banks::factory()->count(50)->create();
    }
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
