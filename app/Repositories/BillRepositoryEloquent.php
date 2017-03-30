<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\BillRepository;
use AppFinancial\Models\Bill;
use AppFinancial\Presenters\BillPresenter;

class BillRepositoryEloquent extends BaseRepository implements BillRepository
{
    protected $fieldSearchable = [
        'flow_in'
    ];

    public function model()
    {
        return Bill::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return BillPresenter::class;
    }
}
