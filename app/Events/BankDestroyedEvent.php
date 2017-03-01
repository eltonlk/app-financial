<?php

namespace AppFinancial\Events;

use AppFinancial\Models\Bank;

class BankDestroyedEvent
{
    private $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    public function getBank()
    {
        return $this->bank;
    }
}
