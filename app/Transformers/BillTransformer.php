<?php

namespace AppFinancial\Transformers;

use League\Fractal\TransformerAbstract;
use AppFinancial\Models\Bill;

class BillTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'bank_account',
    ];

    public function transform(Bill $model)
    {
        return [
            'id'              => (int) $model->id,
            'flow_in'         => (bool) $model->flow_in,
            'description'     => $model->description,
            'due_at'          => $model->due_at,
            'amount'          => (float) $model->amount,
            'bank_account_id' => (int) $model->bank_account_id,
            'paid'            => (bool) $model->paid,
            'created_at'      => $model->created_at,
            'updated_at'      => $model->updated_at
        ];
    }

    public function includeBankAccount(Bill $model) {
        return $this->item($model->bank_account, new BankAccountTransformer);
    }
}
