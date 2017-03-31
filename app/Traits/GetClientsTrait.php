<?php

namespace AppFinancial\Traits;

trait GetClientsTrait {
    private function getClients ()
    {
        $repository = app(\AppFinancial\Repositories\ClientRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}
