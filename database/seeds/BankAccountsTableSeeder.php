<?php

use Illuminate\Database\Seeder;

use AppFinancial\Traits\GetClientsTrait;

class BankAccountsTableSeeder extends Seeder
{
    use GetClientsTrait;

    public function run()
    {
        $clients = $this->getClients();
        $banks = $this->getBanks();

        $max = 15;
        $bankAccountId = rand(1, $max);

        factory(\AppFinancial\Models\BankAccount::class, $max)
            ->make()
            ->each(function ($bankAccount) use ($banks, $bankAccountId, $clients) {
                $bank = $banks->random();
                $client = $clients->random();

                $bankAccount->bank_id = $bank->id;
                $bankAccount->client_id = $client->id;

                $bankAccount->save();

                if ($bankAccountId == $bankAccount->id) {
                    $bankAccount->default = true;
                    $bankAccount->save();
                }
            });
    }

    private function getBanks ()
    {
        $repository = app(\AppFinancial\Repositories\BankRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}
