<?php

namespace AppFinancial\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bill extends Model implements Transformable
{
    use BelongsToTenants;
    use TransformableTrait;

    protected $fillable = [
        'amount',
        'bank_account_id',
        'description',
        'due_at',
        'flow_in',
        'paid',
    ];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
