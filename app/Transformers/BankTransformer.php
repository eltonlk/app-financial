<?php

namespace AppFinancial\Transformers;

use League\Fractal\TransformerAbstract;
use AppFinancial\Models\Bank;

class BankTransformer extends TransformerAbstract
{
    public function transform(Bank $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
