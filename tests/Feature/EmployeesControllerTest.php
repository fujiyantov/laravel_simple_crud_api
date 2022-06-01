<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Banks;
use App\Models\Employees;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

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

    /**
     * Test delete employee by id
     *
     * @return void
     */
    public function testDeleteEmployeeById()
    {
        $response = $this->delete("/api/employees/" . $this->employee->id);
        $response->assertStatus(200);
    }

    /**
     * Test store a newly resource
     *
     * @return void
     */
    public function testStoreEmployee()
    {
        $image = UploadedFile::fake()->image("images.jpg");

        $response = $this->withHeader("Accept", "application/json")->post('/api/employees', [
            'first_name' => "Jhon",
            'last_name' => "Doe",
            'date_of_birth' => "2022-01-01",
            'phone_number' => "0987654321123",
            'email' => "jhon@app.com",
            'province_id' => 1,
            'city_id' => 1,
            'street' => "Menteng Stree No. VII",
            'zip_code' => "202112",
            'ktp_number' => "999999999999",
            'ktp_file' => $image,
            // 'position_id' => 1,
            // 'bank_id' => 1,
            'account_number' => "999999999999",
        ]);

        $response->assertStatus(201)->assertJsonStructure(["message"]);
    }
}
