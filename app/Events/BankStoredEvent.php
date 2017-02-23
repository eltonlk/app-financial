<?php

namespace AppFinancial\Events;

use Illuminate\Http\UploadedFile;

use AppFinancial\Models\Bank;

class BankStoredEvent
{
    private $bank;
    private $logo;

    public function __construct(Bank $bank, UploadedFile $logo)
    {
        $this->bank = $bank;
        $this->logo = $logo;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function getLogo()
    {
        return $this->logo;
    }
}
