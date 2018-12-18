<?php

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::create([
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'dob' => '1970-01-01',
            'height' => 72,
            'weight' => 200,
            'college_id' => 1,
        ]);

        Player::create([
            'first_name' => 'Kobe',
            'last_name' => 'Bryant',
            'dob' => '1980-06-01',
            'height' => 74,
            'weight' => 180,
            'college_id' => 2,
        ]);
    }

}
