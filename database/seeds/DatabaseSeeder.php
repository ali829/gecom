<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ShippersTableSeeder::class);
        $this->call(DestinationsTableSeeder::class);
        $this->call(EntrepotsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
