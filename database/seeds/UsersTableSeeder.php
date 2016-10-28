<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AppFinancial\User::class, 1)
            ->states('admin')
            ->create([
                'name'  => 'Administrador',
                'email' => 'admin@mail.com'
            ]);
    }
}
