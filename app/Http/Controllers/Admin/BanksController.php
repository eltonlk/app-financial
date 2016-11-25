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
    }

    public function index()
    {
        $banks = $this->repository->paginate();

        // if (request()->wantsJson()) {
        //     return response()->json([
        //         'data' => $banks,
        //     ]);
        // }

        return view('admin.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    public function store(BankCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $bank = $this->repository->create($request->all());

            $response = [
                'message' => 'Bank created.',
                'data'    => $bank->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $bank = $this->repository->find($id);

        return view('admin.banks.edit', compact('bank'));
    }

    public function update(BankUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $bank = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Bank updated.',
                'data'    => $bank->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Bank deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Bank deleted.');
    }
}
