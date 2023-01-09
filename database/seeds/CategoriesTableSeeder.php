<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $facker = Faker::create('App\Categorie');
        for($i=0; $i < 15 ; $i++){
            DB::table('categories')->insert([
                'nom' => $facker->word,
                'description' => implode($facker->paragraphs(2)),
            ]);
        }

        for($i=0; $i < 20 ; $i++){
            DB::table('categories')->insert([
                'nom' => $facker->word,
                'parent_id' => $facker->numberBetween(2,11),
                'description' => implode($facker->paragraphs(2)),
            ]);
        }

    }
}
