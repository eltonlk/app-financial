<?php

use Illuminate\Database\Seeder;

class BankAccountsTableSeeder extends Seeder
{
    public function run()
    {
        $repository = app(\AppFinancial\Repositories\BankRepository::class);
        $repository->skipPresenter(true);
        $banks = $repository->all();
        $max = 15;
        $bankAccountId = rand(1, $max);

        factory(\AppFinancial\Models\BankAccount::class, $max)
            ->make()
            ->each(function ($bankAccount) use ($banks, $bankAccountId) {
                $bank = $banks->random();

                $bankAccount->bank_id = $bank->id;

                $bankAccount->save();

                if ($bankAccountId == $bankAccount->id) {
                    $bankAccount->default = true;
                    $bankAccount->save();
                }
            });
    }
}
