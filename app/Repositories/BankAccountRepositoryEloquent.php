<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\BankAccountRepository;
use AppFinancial\Models\BankAccount;

class BankAccountRepositoryEloquent extends BaseRepository implements BankAccountRepository
{
    public function model()
    {
        return BankAccount::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
