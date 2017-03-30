<?php

namespace AppFinancial\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BankAccount extends Model implements Transformable
{
    use BelongsToTenants;
    use TransformableTrait;

    protected $fillable = [
        'name',
        'agency',
        'account',
        'bank_id',
        'default'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
