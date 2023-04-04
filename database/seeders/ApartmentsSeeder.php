<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

            for ($i = 1; $i < 50; $i++) {

        	$apartments = [
        			     'name' => $faker->name,
        			     'price' => mt_rand(1, 10000),
        			     'bedrooms' => mt_rand(1, 9),
        			     'bathrooms' => mt_rand(1, 9),
        			     'storeys' => mt_rand(1, 9),
        			     'garages' => mt_rand(1, 9),
        				];

				DB::table('apartments')->insert($apartments);  
        }
    }
}
