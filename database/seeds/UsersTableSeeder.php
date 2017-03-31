<?php

use Illuminate\Database\Seeder;

use AppFinancial\Models\User;
use AppFinancial\Traits\GetClientsTrait;

class UsersTableSeeder extends Seeder
{
    use GetClientsTrait;

    public function run()
    {
        $clients = $this->getClients();

        factory(User::class, 1)
            ->states('admin')
            ->create([
                'name'  => 'Administrador',
                'email' => 'admin@mail.com'
            ]);

        foreach (range(1, 50) as $value) {
            factory(User::class, 1)
                ->create([
                    'name'  => "Cliente da Silva nº $value",
                    'email' => "cliente_$value@mail.com"
                ])->each(function ($user) use ($clients) {
                    $client = $clients->random();

                    $user->client()->associate($client);
                    $user->save();
                });
        }
    }
}
