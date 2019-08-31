<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('asdasd'),
            'admin' => 1,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'gender' => null,
            'country' => $faker->country,
            'city' => $faker->city,
            'zipcode' => $faker->postcode,
            'street_name' => $faker->streetName,
            'street_nr' => $faker->buildingNumber,
        ]);

        for ($i=0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->name.'@mail.com',
                'password' => bcrypt('asdasd'),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => null,
                'country' => $faker->country,
                'city' => $faker->city,
                'zipcode' => $faker->postcode,
                'street_name' => $faker->streetName,
                'street_nr' => $faker->buildingNumber,
            ]);
        }
    }
}
