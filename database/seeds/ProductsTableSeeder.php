<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('App\Client');

        $last_variante = 0;

        for ($i = 0; $i < 15; $i++) {
            DB::table('products')->insert([
                'name' => implode($faker->words(2)),
                'description' => implode($faker->paragraphs(3)),
                'categorie_id' => $faker->numberBetween(1, 11),
                'options' => 'color'
            ]);

            $nbr = rand(1,3);
            for ($j = 0; $j < $nbr; $j++) {

                $last_variante++;

                DB::table('variantes')->insert([
                    'name' => $faker->unique()->word(),
                    'price' => $faker->biasedNumberBetween(10, 2000),
                    'product_id' => $i+1
                ]);

                $nbr_ent = rand(2,3);

                for ($k=0; $k < $nbr_ent; $k++) {
                    DB::table('entrepot_variante')->insert([
                        'variante_id' => $last_variante,
                        'entrepot_id' => $k+1,
                        'qte' => $faker->numberBetween(0, 59)
                    ]);
                }
            }
        }
    }
}
