<?php

namespace AppFinancial\Presenters;

use AppFinancial\Transformers\CategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class CategoryPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new CategoryTransformer();
    }
}
