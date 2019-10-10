<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(PropertyTableSeeder::class);
         $this->call(DetailTableSeeder::class);
         $this->call(ProductDetailTableSeeder::class);
         $this->call(OrderTableSeeder::class);
         $this->call(ProductOrderTableSeeder::class);
         $this->call(ReviewTableSeeder::class);
         $this->call(FaqTableSeeder::class);
         $this->call(ProductTypeTableSeeder::class);
    }
}
