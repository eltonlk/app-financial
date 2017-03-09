<?php

namespace AppFinancial\Http\Controllers\Api;

use Illuminate\Http\Request;

use AppFinancial\Http\Controllers\Controller;
use AppFinancial\Http\Requests\BankAccountCreateRequest;
use AppFinancial\Http\Requests\BankAccountUpdateRequest;
use AppFinancial\Repositories\BankAccountRepository;

class BankAccountsController extends Controller
{
    protected $repository;

    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->paginate();
    }

    public function store(BankAccountCreateRequest $request)
    {
        $bankAccount = $this->repository->create($request->all());

        return response()->json($bankAccount, 201);
    }

    public function show($id)
    {
        $bankAccount = $this->repository->find($id);

        return response()->json($bankAccount);
    }

    public function update(BankAccountUpdateRequest $request, $id)
    {
        $bankAccount = $this->repository->update($request->all(), $id);

        return response()->json($bankAccount);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return response()->json([], 204);
    }
}
