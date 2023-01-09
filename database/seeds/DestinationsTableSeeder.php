<?php

use Illuminate\Database\Seeder;

class DestinationsTableSeeder extends Seeder
{
    public function run()
    {
        foreach(['Kénitra', 'Rabat', 'Casablanca', 'Marrakech'] as $destination){
            DB::table('destinations')->insert([
                'name' => $destination
            ]);
        }
    }
}
