<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllEmployees()
    {
        $response = $this->get('/api/employees');

        $response->assertStatus(200)->assertJsonStructure([
            "current_page",
            "data" => [],
            "first_page_url",
            "from",
            "last_page",
            "last_page_url",
            "links" => [
                "*" => [
                    "url",
                    "label",
                    "active"
                ]
            ],
            "next_page_url",
            "path",
            "per_page",
            "prev_page_url",
            "to",
            "total",
        ]);
    }

    /**
     * Test display specified resource by ID
     *
     * @return void
     */
    public function testGetEmployeeById()
    {
        $response = $this->get('/api/employees/1');
        $response->assertStatus(200)->assertJsonStructure(
            [
                "id",
                "first_name",
                "last_name",
                "date_of_birth",
                "phone_number",
                "email",
                "province",
                "city",
                "street",
                "zip_code",
                "ktp_number",
                "position_id",
                "bank_id",
                "account_number",
                "created_at",
                "updated_at",
            ]
        );
    }

    // TODO:: Create Filter, Post, Update, and Delete Resource
}
