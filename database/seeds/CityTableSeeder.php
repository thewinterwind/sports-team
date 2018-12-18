<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'id' => 1,
            'name' => 'Chicago',
            'state_id' => 1,
        ]);

        City::create([
            'id' => 2,
            'name' => 'Los Angeles',
            'state_id' => 32,
        ]);

        City::create([
            'id' => 3,
            'name' => 'Houston',
            'state_id' => 6,
        ]);
    }
}
