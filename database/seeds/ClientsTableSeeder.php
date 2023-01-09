<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('App\Client');
        for($i=1;$i<30 ; $i++){
            DB::table('clients')->insert([
                'titre'=>$faker->title('male'|'fmale'),
                'nom'=>$faker->firstName('male'|'fmale'),
                'prenom'=>$faker->lastNAme,
                'tel'=>$faker->e164PhoneNumber,
                'email'=>$faker->email,
                'password'=>bcrypt('123456'),
                'adresse'=>$faker->streetAddress,
                'code_postal'=>$faker->postcode,
                'ville'=>$faker->city,
                'pays'=>$faker->country,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
