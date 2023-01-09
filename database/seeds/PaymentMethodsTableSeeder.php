<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'nom' => 'Paiement a la laivrison',
        ]);
        DB::table('payment_methods')->insert([
            'nom' => 'Paypal',
        ]);
        DB::table('payment_methods')->insert([
            'nom' => 'Cart bancaire',
        ]);
    }
}
