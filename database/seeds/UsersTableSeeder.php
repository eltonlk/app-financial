<?php

use Illuminate\Database\Seeder;

use AppFinancial\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 1)
            ->states('admin')
            ->create([
                'name'  => 'Administrador',
                'email' => 'admin@mail.com'
            ]);

        factory(User::class, 1)
            ->create([
                'name'  => 'Cliente da Silva',
                'email' => 'cliente@mail.com'
            ]);
    }
}
