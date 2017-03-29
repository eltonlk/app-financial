<?php

namespace AppFinancial\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Prettus\Repository\Events\RepositoryEventBase;

use AppFinancial\Repositories\BankAccountRepository;

class BankAccountSetDefaultListener
{
    private $repository;

    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->skipPresenter(true);
    }

    public function handle(RepositoryEventBase $event)
    {
        $model = $event->getModel();

        if (!$model->default) {
            return;
        }

        $collection = $this->repository
            ->findByField('default', true)
            ->filter(function ($value, $key) use ($model) {
                return $model->id != $value->id;
            });

        $bankAccountDefault = $collection->first();

        if ($bankAccountDefault) {
            $this->repository->update([ 'default' => false ], $bankAccountDefault->id);
        }
    }
}
