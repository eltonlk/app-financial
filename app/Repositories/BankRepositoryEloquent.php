<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\BankRepository;
use AppFinancial\Events\BankDestroyedEvent;
use AppFinancial\Events\BankStoredEvent;
use AppFinancial\Models\Bank;
use AppFinancial\Presenters\BankPresenter;

class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    protected $fieldSearchable = [
        'name' => 'like'
    ];

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
        $logo = null;
        $skipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        if (isset($attributes['logo'])) {
            $logo = $attributes['logo'];
        }

        $attributes['logo'] = env('BANK_LOGO_DEFAULT');

        $model = parent::create($attributes);

        event(new BankStoredEvent($model, $logo));

        $this->skipPresenter = $skipPresenter;

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $logo = null;
        $skipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        if (isset($attributes['logo']) && $attributes['logo'] instanceof \Illuminate\Http\UploadedFile) {
            $logo = $attributes['logo'];
            unset($attributes['logo']);
        }

        $model = parent::update($attributes, $id);

        event(new BankStoredEvent($model, $logo));

        $this->skipPresenter = $skipPresenter;

        return $model;
    }

    public function delete($id) {
        $skipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->find($id);

        $deleted = parent::delete($id);

        event(new BankDestroyedEvent($model));

        $this->skipPresenter = $skipPresenter;

        return $deleted;
    }

    public function presenter()
    {
        return BankPresenter::class;
    }
}


