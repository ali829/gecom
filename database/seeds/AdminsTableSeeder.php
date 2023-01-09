<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'twidlo',
            'email' => 'contact@twidlo.com',
            'password' => bcrypt('twidlotwidlo')
        ]);
    }
}
