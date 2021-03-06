<?php

namespace AppFinancial\Transformers;

use League\Fractal\TransformerAbstract;
use AppFinancial\Models\BankAccount;

class BankAccountTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'bank',
    ];

    public function transform(BankAccount $model)
    {
        return [
            'id'         => (int) $model->id,
            'bank_id'    => (int) $model->bank_id,
            'name'       => $model->name,
            'agency'     => $model->agency,
            'account'    => $model->account,
            'default'    => (bool) $model->default,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeBank(BankAccount $model) {
        return $this->item($model->bank, new BankTransformer);
    }
}
