<?php

namespace AppFinancial\Http\Controllers\Admin;

use AppFinancial\Http\Controllers\Controller;

use AppFinancial\Http\Requests\BankCreateRequest;
use AppFinancial\Http\Requests\BankUpdateRequest;
use AppFinancial\Repositories\BankRepository;

class BanksController extends Controller
{
    protected $repository;

    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->skipPresenter(true);
    }

    public function index()
    {
        $banks = $this->repository->paginate();

        return view('admin.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    public function store(BankCreateRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.banks.index');
    }

    public function edit($id)
    {
        $bank = $this->repository->find($id);

        return view('admin.banks.edit', compact('bank'));
    }

    public function update(BankUpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);

        return redirect()->route('admin.banks.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->back()->with('message', 'Bank deleted.');
    }
}
