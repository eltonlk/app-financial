<?php

namespace AppFinancial\Http\Controllers\Api;

use AppFinancial\Http\Controllers\Controller;
use AppFinancial\Repositories\BankRepository;

class BanksController extends Controller
{
    protected $repository;

    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }
}
