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

        $filename = md5(time()) . '.' . $logo->guessExtension();
        $path = Bank::logosPath();

        \Storage::disk('public')->putFileAs($path, $logo, $filename);

        $this->repository->update([ 'logo' => $name ], $bank->id);
    }
}
