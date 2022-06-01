<?php

namespace Database\Seeders;

use App\Models\Banks;
use Illuminate\Database\Seeder;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://raw.githubusercontent.com/mul14/gudang-data/master/bank/bank.json";
        $collections = json_decode(file_get_contents($url), true);

        foreach ($collections as $collection) {
            $bank = new Banks();
            $bank->code = $collection['code'];
            $bank->name = $collection['name'];
            $bank->save();
        }
    }
}
