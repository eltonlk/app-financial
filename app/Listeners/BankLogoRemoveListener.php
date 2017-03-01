<?php

namespace AppFinancial\Listeners;

use AppFinancial\Events\BankDestroyedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BankLogoRemoveListener
{
    public function __construct()
    {
    }

    public function handle(BankDestroyedEvent $event)
    {
        $bank = $event->getBank();

        if ($bank->logo != env('BANK_LOGO_DEFAULT') && file_exists(storage_path('app/public/banks/images/' . $bank->logo))) {
            unlink(storage_path('app/public/banks/images/' . $bank->logo));
        }
    }
}
