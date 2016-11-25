<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\BankRepository;
use AppFinancial\Models\Bank;
use AppFinancial\Validators\BankValidator;

class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    public function model()
    {
        return Bank::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
