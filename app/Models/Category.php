<?php

namespace AppFinancial\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use BelongsToTenants;
    use NodeTrait;
    use TransformableTrait;

    protected $fillable = [
        'name',
        'parent_id'
    ];
}
