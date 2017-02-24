<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\BankRepository;
use AppFinancial\Events\BankStoredEvent;
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

    public function create(array $attributes)
    {
        $logo = $attributes['logo'];
        unset($attributes['logo']);

        $model = parent::create($attributes);

        event(new BankStoredEvent($model, $logo));

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $logo = null;

        if (isset($attributes['logo'])) {
            $logo = $attributes['logo'];
            unset($attributes['logo']);
        }

        $model = parent::update($attributes, $id);

        event(new BankStoredEvent($model, $logo));

        return $model;
    }
}
