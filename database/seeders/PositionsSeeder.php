<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            "manager",
            "staff",
            "admin",
        ];

        foreach ($collections as $collection) {
            Positions::create(["name" => $collection]);
        }
    }
}
