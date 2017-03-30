<?php

use Illuminate\Database\Seeder;
use AppFinancial\Models\Client;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Client::class, 5)->create();
    }
}
