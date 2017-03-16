<?php

namespace AppFinancial\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use AppFinancial\Models\Bank;
use AppFinancial\Events\BankDestroyedEvent;

class BankLogoRemoveListener
{
    public function __construct()
    {
    }

    public function handle(BankDestroyedEvent $event)
    {
        $bank = $event->getBank();

        $path = Bank::logosPath() . '/' . $bank->logo;

        \Storage::disk('public')->delete($path);
    }
}
