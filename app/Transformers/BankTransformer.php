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
            'logo'       => $this->makeLogoPath($model),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function makeLogoPath (Bank $model) {
        $url = url('/');
        $folder = Bank::logosPath();

        return "$url/storage/$folder/{$model->logo}";
    }
}
