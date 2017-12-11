<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'root',
            'password' => bcrypt('toor'),
            'admin' => true
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'username' => 'user',
            'password' => bcrypt('user'),
            'admin' => false
        ]);

        DB::table('titles')->insert([
            'abbreviation' => 'M.',
            'label' => 'Monsieur'
        ]);

        DB::table('titles')->insert([
            'abbreviation' => 'Mme.',
            'label' => 'Madame'
        ]);

        $faker = Faker::create('fr_FR');
    	for ($x = 0; $x < 5; $x++) {
	        DB::table('postal_codes')->insert([
	            'label' => rand(1001,95999)
	        ]);

            DB::table('cities')->insert([
	            'label' => $faker->city,
                'postal_code_id' => $x + 1
	        ]);

        }

        for ($x = 0; $x < 20; $x++) {

            DB::table('addresses')->insert([
                'label' => $faker->streetAddress,
                'city_id' => rand(1,5)
            ]);

            DB::table('hunters')->insert([
	            'title_id' => 1,
                'lastName' => $faker->lastname,
                'firstName' => $faker->firstNameMale,
                'address_id' => $x + 1,
                'active' => rand(0,1)
	        ]);

        }

        for ($x = 0; $x < 20; $x++) {

            DB::table('addresses')->insert([
                'label' => $faker->streetAddress,
                'city_id' => rand(1,5)
            ]);

            DB::table('lessors')->insert([
                'title_id' => 1,
                'lastName' => $faker->lastname,
                'firstName' => $faker->firstNameMale,
                'address_id' => $x + 11,
                'hectares' => rand(1,100),
                'price' => rand(1,100),
                'validityDate' => rand(2017,2020)
            ]);

        }


    }
}
