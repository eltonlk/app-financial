<?php

namespace AppFinancial\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'AppFinancial\Events\BankStoredEvent' => [
            'AppFinancial\Listeners\BankLogoUploadListener',
        ],
        'AppFinancial\Events\BankDestroyedEvent' => [
            'AppFinancial\Listeners\BankLogoRemoveListener',
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
