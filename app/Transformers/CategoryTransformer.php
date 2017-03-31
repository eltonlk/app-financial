<?php

namespace AppFinancial\Transformers;

use League\Fractal\TransformerAbstract;
use AppFinancial\Models\Category;

class CategoryTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [ 'children' ];

    public function transform(Category $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeChildren(Category $model)
    {
        if ($model->children) {
            return $this->collection($model->children, new CategoryTransformer());
        }
    }
}
