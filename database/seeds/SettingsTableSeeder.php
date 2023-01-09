<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'nom' => 'twidlo',
            'description'=>'twidlo',
            'domain'=>'www.twidlo.com',
            'devise'=>'DH',
            'email'=>'contact@twidlo.com',
            'tel'=>'+212654894191',
            'address'=>'kenitra alwafa lot pij',
            'theme'=>'canvas',
            'footer'=>'powered by twidlo.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
