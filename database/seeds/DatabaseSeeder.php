<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(ApartmentSeeder::class);
        //$this->call(ServiceSeeder::class);
        //$this->call(ReviewSeeder::class);

        Model::reguard();
    }
}
