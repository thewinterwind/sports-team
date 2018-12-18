<?php

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Chicago Bulls',
            'short_name' => 'Bulls',
            'city_id' => 1,
            'stadium_id' => 20,
        ]);

        Team::create([
            'name' => 'Los Angeles Lakers',
            'short_name' => 'Lakers',
            'city_id' => 2,
            'stadium_id' => 21,
        ]);
    }
}
