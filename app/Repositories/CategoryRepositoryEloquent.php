<?php

namespace AppFinancial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AppFinancial\Repositories\CategoryRepository;
use AppFinancial\Models\Category;
use AppFinancial\Presenters\CategoryPresenter;

class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    public function model()
    {
        return Category::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CategoryPresenter::class;
    }

    public function create(array $attributes)
    {
        if (isset($attributes['parent_id'])) {
            $skipPresenter = $this->skipPresenter;
            $this->skipPresenter(true);

            $parent = $this->find($attributes['parent_id']);

            $this->skipPresenter = $skipPresenter;

            $child = $parent->children()->create($attributes);
            return $this->parserResul($child);
        } else {
            return parent::create($attributes);
        }
    }

    public function update(array $attributes, $id)
    {
        if (isset($attributes['parent_id'])) {
            $skipPresenter = $this->skipPresenter;
            $this->skipPresenter(true);

            $child = $this->find($id);
            $child->parent_id = $attributes['parent_id']
            $child->save();

            $this->skipPresenter = $skipPresenter;

            return $this->parserResul($child);
        } else {
            return parent::update($attributes, $id);
        }
    }
}
