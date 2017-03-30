<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClientsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BankAccountsTableSeeder::class);
    }
}
