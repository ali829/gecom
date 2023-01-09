<?php

use Illuminate\Database\Seeder;

class ShippersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('shippers')->insert([
            'company_name'=>'free shipping',
            'email'=>'free@gmail.com',
            'phone'=>'0700000'
        ]);

        DB::table('shippers')->insert([
            'company_name'=>'amana',
            'email'=>'amana@gmail.com',
            'phone'=>'0700000'
        ]);

        DB::table('shippers')->insert([
            'company_name'=>'jiblim3ak',
            'email'=>'jiblim3ak@gmail.com',
            'phone'=>'0600000'
        ]);
    }

}
