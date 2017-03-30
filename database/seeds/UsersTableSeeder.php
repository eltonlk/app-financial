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

        $repository = app(\AppFinancial\Repositories\ClientRepository::class);
        $repository->skipPresenter(true);
        $clients = $repository->all();

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
