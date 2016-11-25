<?php

use Illuminate\Database\Seeder;

use AppFinancial\Models\Bank;

class BanksTableSeeder extends Seeder
{
    public function run()
    {
        factory(Bank::class, 10)->create();
    }
}
