<?php

namespace AppFinancial\Http\Controllers\Api;

use Illuminate\Http\Request;

use AppFinancial\Criteria\FindRootCategoriesCriteria;
use AppFinancial\Http\Controllers\Controller;
use AppFinancial\Http\Requests\CategoryCreateRequest;
use AppFinancial\Http\Requests\CategoryUpdateRequest;
use AppFinancial\Repositories\CategoryRepository;

class CategoriesController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->repository->pushCriteria(new FindRootCategoriesCriteria());
        return $this->repository->all();
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = $this->repository->create($request->all());

        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = $this->repository->find($id);

        return response()->json($category);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->repository->update($request->all(), $id);

        return response()->json($category);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return response()->json([], 204);
    }
}
