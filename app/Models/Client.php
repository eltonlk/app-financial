<?php

namespace AppFinancial\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name'
    ];

    public function bank_accounts ()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function bills ()
    {
        return $this->hasMany(Bill::class);
    }

    public function users ()
    {
        return $this->hasMany(User::class);
    }
}
