<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Banks;
use App\Models\Employees;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeesControllerTest extends TestCase
{
    private $employee;

    public function setUp(): void
    {
        parent::setUp();
        $this->employee = Employees::factory()->create();
    }

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

    public function testDeleteEmployeeById()
    {
        $response = $this->delete("/api/employees/" . $this->employee->id);
        $response->assertStatus(200);
    }

    // TODO:: Create Filter, Post, Update, and Delete Resource
}
