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
        'AppFinancial\Events\BankDestroyedEvent' => [
            'AppFinancial\Listeners\BankLogoRemoveListener',
        ],
        'Prettus\Repository\Events\RepositoryEntityCreated' => [
            'AppFinancial\Listeners\BankAccountSetDefaultListener'
        ],
        'Prettus\Repository\Events\RepositoryEntityUpdated' => [
            'AppFinancial\Listeners\BankAccountSetDefaultListener'
        ]
    ];

    public function boot()
    {
        parent::boot();
    }
}
