<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        for($i=1; $i<=50; $i++) {

            $review= [
                'email'  => $faker->email,
                'name'   => $faker->name,
                'text'   => $faker->text(rand(300,1000)),
                'ip'     =>$faker->ipv4,
                'active' =>1,
            ];
            Review::create($review);

        }
        //
    }
}
