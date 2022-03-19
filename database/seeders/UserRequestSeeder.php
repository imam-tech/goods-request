<?php

namespace Database\Seeders;

use App\Models\UserRequest;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            UserRequest::create([
                'id' => $i,
                'name' => $faker->name,
                'nik' => '001.059.0058' . $i,
                'department' => 'Calendar'
            ]);
        }
    }
}
