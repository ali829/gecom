<?php

use Illuminate\Database\Seeder;

class EntrepotsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('entrepots')->insert([
            'nom'=>'ent1',
            'description'=>'description ',
            'adresse'=>'al wafa 2 nr 666 kenitra',
            'volume'=>100,
            'destination_id'=>'1',
            'etat'=>'ouvert'
        ]);

        DB::table('entrepots')->insert([
            'nom'=>'ent2',
            'description'=>'description 2',
            'adresse'=>'al wafa 2 nr 667 kenitra',
            'volume'=>120,
            'destination_id'=>'1',
            'etat'=>'ouvert'
        ]);

        DB::table('entrepots')->insert([
            'nom'=>'ent3',
            'description'=>'description 3',
            'adresse'=>'al wafa 2 nr 668 kenitra',
            'volume'=>200,
            'destination_id'=>'1',
            'etat'=>'ferme'
        ]);
    }
}
