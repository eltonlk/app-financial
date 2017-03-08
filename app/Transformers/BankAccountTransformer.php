<?php

namespace AppFinancial\Transformers;

use League\Fractal\TransformerAbstract;
use AppFinancial\Models\BankAccount;

/**
 * Class BankAccountTransformer
 * @package namespace AppFinancial\Transformers;
 */
class BankAccountTransformer extends TransformerAbstract
{

    /**
     * Transform the \BankAccount entity
     * @param \BankAccount $model
     *
     * @return array
     */
    public function transform(BankAccount $model)
    {
        return [
            'id'         => (int) $model->id,
            'bank_id'    => $model->bank_id,
            'name'       => $model->name,
            'agency'     => $model->agency,
            'account'    => $model->account,
            'default'    => (bool) $model->default,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
