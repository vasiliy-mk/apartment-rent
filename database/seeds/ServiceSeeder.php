<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=20; $i++) {

            $services= [
                'name'=>'Сервис_'.$i,
                'active'=>'1',
                'created_at'=>'2015-09-19 16:57:25',
                'updated_at'=>'2015-09-19 16:57:25',
            ];
            \App\Service::create($services);

        }

    }
}


