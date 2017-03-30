<?php

namespace AppFinancial\Http\Controllers\Api;

use Illuminate\Http\Request;

use AppFinancial\Http\Controllers\Controller;
use AppFinancial\Http\Requests\BillCreateRequest;
use AppFinancial\Http\Requests\BillUpdateRequest;
use AppFinancial\Repositories\BillRepository;

class BillsController extends Controller
{
    protected $repository;

    public function __construct(BillRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->paginate();
    }

    public function store(BillCreateRequest $request)
    {
        $bill = $this->repository->create($request->all());

        return response()->json($bill, 201);
    }

    public function show($id)
    {
        $bill = $this->repository->find($id);

        return response()->json($bill);
    }

    public function update(BillUpdateRequest $request, $id)
    {
        $bill = $this->repository->update($request->all(), $id);

        return response()->json($bill);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return response()->json([], 204);
    }
}
