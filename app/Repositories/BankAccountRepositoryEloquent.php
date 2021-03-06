<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\BankAccountRepository;
use AppFinancial\Models\BankAccount;
use AppFinancial\Presenters\BankAccountPresenter;

class BankAccountRepositoryEloquent extends BaseRepository implements BankAccountRepository
{
    protected $fieldSearchable = [
        'name'      => 'like',
        'agency'    => 'like',
        'account'   => 'like',
        'bank.name' => 'like'
    ];

    public function model()
    {
        return BankAccount::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return BankAccountPresenter::class;
    }
}
