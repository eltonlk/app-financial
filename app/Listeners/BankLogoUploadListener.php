<?php

namespace AppFinancial\Listeners;

use AppFinancial\Events\BankStoredEvent;
use AppFinancial\Models\Bank;
use AppFinancial\Repositories\BankRepository;

class BankLogoUploadListener
{
    private $repository;

    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(BankStoredEvent $event)
    {
        $bank = $event->getBank();
        $logo = $event->getLogo();

        if ($logo) {
            $filename = $bank->created_at != $bank->updated_at ? $bank->logo : md5(time()) . '.' . $logo->guessExtension();

            \Storage::disk('public')->putFileAs(Bank::logosPath(), $logo, $filename);

            $bank->logo = $filename;
            $bank->save();
        }
    }
}
